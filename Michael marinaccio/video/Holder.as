import myColor

class video.Holder extends MovieClip{
	private var speed:Number = 20
	private var hw:Number = 100 //heigth and size of icons
	private var maxHeight:Number = 200 //Max available heigth on Stage
	private var maxWidth:Number = 300 //Max available heigth on Stage	
	private var first:Number
	private var last:Number
	private var foto:MovieClip
	private var preload:MovieClip
	private var back:MovieClip
	private var soon:MovieClip
	private var pic:MovieClip //holder to load icons
	private var main:MovieClip//MediaDisplay component
	//private var mColor : myColor
	private var cmMenu:ContextMenu  //rigth click to save
	
	//Constructor
	function Holder(){						
		preload._visible = false //hides preload
		
	}
	function loadVideo (who : String, dur:Number) : Void	{		
		this._visible = true
		main.setMedia("videos/orig/"+who+".flv", "FLV")
		main.totalTime = dur
		main.play(0)
    }
	//caller is a callback, because this function is recursive
	function loadIcons (caller:Object, image:String) : Void
	{
	trace("loading icons")
		pic.loadMovie ("videos/pics/" +image+".jpg")
		pic._visible = false
		preload._visible = true
		
		this["nr"] = caller.getModel().getPos()
		this.onEnterFrame = function ()
		{
			var perc = int ((pic.getBytesLoaded () * 100) / pic.getBytesTotal ())
			preload.barra._xscale = perc
			pic._visible = false
			preload._visible = false
			back._visible = false
			if (preload.barra._xscale >= 100 and pic.getBytesLoaded() > 1 && pic._width>1)
			{				
				preload._visible = false
				pic._visible = true
				back._visible = true
				soon._visible = false
				//position on center, pics are resized to match one side (heigth or width) of initHolder
				var w = pic._width
				var h = pic._height
				var cx = (w != hw) ?int ((hw - w) / 2) : 0;
				var cy = (h != hw) ?int ((hw - h) / 2) : 0;
				pic._x += cx;
				pic._y += cy
				/*
				// IMTI - to change the fast visiblility fo tn
				// Color brigthness
				this.b = 12
				this.cant = 255
				this.mColor = new myColor (pic)
				this.mColor.setBrightOffset (this.cant)
				*/
				//overwrite onEnterFrame
				this.onEnterFrame = function ()
				{					
					this.mColor.setBrightOffset (this.cant -= this.b)
					this._parent.output.text = "Loading: " + caller.getModel().currentItem;
					if (this.cant <= 10)
					{
						//set rollOver, RollOut, Press
						this.onRollOver = function ()
						{
							this.pic.gotoAndPlay(1)
							//this.mColor.setBrightOffset (100)
						}
						this.onRollOut = function ()
						{
							this.pic.stop()
							//this.mColor.setBrightOffset (10)
						}
						this.onPress = function ()
						{							
							//Check first that all icons are on place
							var error = false
							var cant = caller.getIconsPerPage()
							//for(var i=0; i<cant; i++) if(!this._parent["h"+i]) error = true
							//Load selected
							if(!error) this._parent.controller.loadVideo(this.nr)
						}						
						delete this.onEnterFrame
						var model = caller.getModel()
						if (model.hasNext())  {
							model.next()
							caller.showIcons ()
						} 	else {
							//Last item in model
							this._parent.pag.reset()
							var last = model.getCantItems()
							var first = (last%caller.getIconsPerPage()!=0)?caller.getIconsPerPage()*Math.floor(last/caller.getIconsPerPage())+1 : caller.getIconsPerPage()*Math.floor(last/caller.getIconsPerPage()-1)+1
							this._parent.output.text = first+" to "+last+" from "+last
							this._parent.controller.loadVideo(first)
						}					
					}
				}
			}
		}
	}
}			