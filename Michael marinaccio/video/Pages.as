class video.Pages extends MovieClip
{
	private var selected : Number = 0; // which foto is selected, 0 by default
	//Formats for numbers
	private var tover : TextFormat;
	private var tnormal : TextFormat;
	private var t : MovieClip; //shorcut to current timeline
	private var controller //:PhotoControllerColumns
	
	function Pages ()
	{
		trace("loaded pages")
		tover = new TextFormat ()
		tnormal = new TextFormat ()
		tover.color = 0xFF0000;
		tnormal.color = 0xFFFFFF;		
		t = this;
	}
	//Needs to interact with controller
	function setController(controller){
		this.controller=controller
	}
	//public function update(m:PhotoModel, o:Object):Void{
	public function update(m, o:Object):Void{		
		reset()
		//highligth selected photo number
		over( t.pages ["nr" +m.getPos()])
	}
	//Buttons highligts
	function normal (who) : Void 
	{
		t._parent["h"+who.count].onRollOut()
		if (selected != who.nr)
		{
			who.pags.setTextFormat (tnormal);
		}
	}
	function over (who) : Void 
	{
		who.pags.setTextFormat (tover);		
		t._parent["h"+who.count].onRollOver()
	}
	function reset ():Void	{
		// All nr to black
		for (var z in t.pages) t.pages [z].pags.setTextFormat (tnormal);
	}
	function pressed (nr : Number) : Void 
	{
		//Check first that all preview are loaded
		var error
		var view = controller.getView()
		var cant = view.getIconsPerPage()
		//for(var i=0; i<cant; i++) if(!this._parent["h"+i]) error = true
		if (error) return		
		reset ();
		t.oldSelected = t.selected
		t.selected = nr;		
		// Selected nr to red
		t.pages["nr"+nr].onRollOver()
		controller.loadVideo(nr)		
	}
	//Display photos numbers
	function displayNumbers (page : Number) : Void 
	{			
		var perPage = controller.getView().getIconsPerPage()
		var i = perPage*(page-1)+1;
		var last = (perPage*page<controller.getModel().getCantItems())?perPage*page : controller.getModel().getCantItems();		
		var pos:Number = 0;
		var m : MovieClip
		t.createEmptyMovieClip ("pages", 1)
		//Put numbers
		t.onEnterFrame = function ()
		{
			if (i <= last)
			{
				trace("attaching: " + i)
				var p = t.pages.attachMovie ("nro", "nr" + i, i , 
				{
					_y : 0
				});
				p.count = pos
				p._x =pos++ * t.pages ["nr" + i]._width;
				p.pags.text = i ;
				p.nr = i;				
				//Page handlers
				p.onPress = function () : Void 
				{
					this._parent._parent.pressed (this.nr);
				};
				p.onRollOver = function () : Void 
				{
					this._parent._parent.over (this);					
				};
				p.onRollOut = function () : Void 
				{
					if(this._parent._parent.selected!=this.nr)
					{					
						this._parent._parent.normal (this);
					}
				};				
				i ++;
			} else 
			{
				//highligth selected photo
				trace("in elze")
				var sel = (controller.getModel().getPos()!=0)?controller.getModel().getPos() : 1				
				this.over (this.pages["nr"+sel])
				delete this.onEnterFrame;
			}
		};
	}	
}
