import video.PhotoModelXml
import video.PhotoControllerColumns
import video.Holder

class video.PhotoViewColumns extends mvc.AbstractView{
	
  private var model:PhotoModelXml;
  private var controller: PhotoControllerColumns;
  private var holder:Holder //holder for photos
  private var iconsP:Array = new Array() //array of icons
  private var cantIcons:Number //quantity of icons on stage
  private var totalPages:Number //total pages of icons
  private var hw:Number = 100 //size of icon
  private var t:MovieClip //timeline
  private var counter:Number=0 //for the icons
  private var output:TextField
  private var dataLoaded:Boolean = false
  private var state:String = "single" //Could be single or icons
 
    /*
   * Constructor
   * @param m  Model of this view
   * @param c Controller of this view
   * @param timeline Reference to the timeline holding this view
   */
  public function PhotoViewColumns (m:PhotoModelXml, c:PhotoControllerColumns, timeline:MovieClip) {
	// Set the model.
    setModel(m);
	t = timeline
    // If a controller was supplied, use it. Otherwise let the first
    // call to getController() create the default controller.
    if (c !== undefined) {
      setController(c);
    }
  }

  /**
   * Returns the default controller for this view.
   */
  public function defaultController (model:PhotoModelXml):PhotoControllerColumns {
    return null;
  }

  /**
   * Sets the model this view is observing.
   * @param m is the model for this view
   */
  public function setModel (m:PhotoModelXml):Void {
    model = m;
  }

  /**
   * Returns the model this view is observing.
   */
  public function getModel ():PhotoModelXml {
    return model;
  }

  /**
   * Sets the controller for this view.
   */
  public function setController (c:PhotoControllerColumns):Void {
    controller = c;
    // Tell the controller this object is its view.
    getController().setView(this);
  }

  /**
   * Returns this view's controller.
   */
  public function getController ():PhotoControllerColumns {
    // If a controller hasn't been defined yet...
    if (controller === undefined) {
      // ...make one. Note that defaultController() is normally overridden 
      // by the AbstractView subclass so that it returns the appropriate
      // controller for the view.
      setController(defaultController(getModel()));
    }
    return controller;
  }
  /*
  * Creates an array of positions for icons
  * @param row quantity of rows
  * @param col quantity of columns
  
  private function setupIcons(row:Number, col:Number):Boolean{	  
	  if(!dataLoaded) return false
	    //outer loop for rows
		for(var r=0; r<row; r++){
			  //inner loop, columns
			  for(var c=0; c<col; c++){
				  iconsP.push({px:hw*c+(300*c), py:(hw*r)+25})				  
			  }
		  }	
		  cantIcons = row*col
		  totalPages = Math.ceil(model.getCantItems()/cantIcons)
		  t.pag.displayNumbers(1)
		  return true
  }
  
   private function setupIcons(row:Number, col:Number):Boolean{	  
	  if(!dataLoaded) return false
	    //outer loop for rows
		for(var c=0; c<col; c++){
			  //inner loop, columns
			  for(var r=0; r<row; r++){
				  iconsP.push({px:hw*r+(300*c), py:(hw*c)+350})				  
			  }
		  }	
		  cantIcons = row*col
		  totalPages = Math.ceil(model.getCantItems()/cantIcons)
		  t.pag.displayNumbers(1)
		  return true
  }
  */
   private function setupIcons(row:Number, col:Number):Boolean{	  
	  if(!dataLoaded) return false
	    //outer loop for rows
		for(var c=0; c<col; c++){
			  //inner loop, columns
			  for(var r=0; r<row; r++){
				  trace("c: " + c + "|r: " + r);
				  iconsP.push({px:hw*r+(300*c)+100, py:(hw*c)+325})				  
			  }
		  }	
		  cantIcons = row*col
		  totalPages = Math.ceil(model.getCantItems()/cantIcons)
		  t.pag.displayNumbers(1)
		  return true
  }
  /**
   * Implementation of the Observer interface's implemented 
   * in AbstractView Subclasses
   * @param model is the model this view is servicing
   * @param o is the message broadcasted from the model
   */
  public function update(model:PhotoModelXml, o:Object):Void {
	  var pos = model.getPos()
	  switch(o.name){

		   case "loaded": //photo info is loaded
				dataLoaded=true				
				break;
			case "previous":	//next and previous arrows		
			case "next":
				if(state=="single") { // handle only single state
					t.initHolder.change(model.currentItem)
					//Show/hide arrows
					if(pos==1) hidePrev(); else showPrev()
					if(pos==model.getCantItems()) hideNext(); else showNext()
					//Change numbers when page change
					if((o.name=="previous" && pos%cantIcons==0) || (o.name=="next" && pos%cantIcons==1)) {
							t.pag.displayNumbers(getPage())							 
					}
					//output message
					t.output.text = "Video " + pos + ": " + model.getCurrentName();					
				} 				
				break;
			case "loadVideo": //load a video when a pic is pressed				
				//change state
				setState("single")				
				t.initHolder._visible = true
				t.initHolder.loadVideo(model.currentItem, model.getDuration())
				t.output.text = "Video " +pos + ": " + model.getCurrentName();
				break
			default:
			    trace("Nothing here!")
	   }
  }
   /*
  * makeIcons creates Icons on stage
  * @param pos could be current, next or previous
  */
  public function makeIcons (pos:String) : Void {	  
	  var page = getPage()
	   //calculate page
	   if(pos!="current") page = (pos=="next")?page+=1 : page-=1
	   //Show or hide next and previous arrows
	   if(Math.ceil(model.getCantItems()/cantIcons)==page) hideNext(); else showNext()
		if(page==1) hidePrev(); else showPrev()
	   //First item of this page
	   var first = ((page-1)*cantIcons)+1
	    model.currentItem = first
		var init:Number = model.getPos()
		var last:Number								
		//resets counter
		counter = 0;
		//Hide single loader	and big photo	
		t.initHolder._visible = t.foto._visible = false
		last = ((init+iconsP.length)<=model.getCantItems())?init + (iconsP.length)-1 : model.getCantItems()		
		t.output.text = first+" to "+last+" from "+model.getCantItems()
	    showIcons()
		//Display photo numbers
		 t.pag.displayNumbers(page)
  }
  //How many icons per page is holding this view
  public function getIconsPerPage():Number{	  
	  return cantIcons
  }
   //Show icons render the icons on Stage. It's called from the Holder class recursively until all icons finish to load
  private function showIcons () : Void
	{		
		trace("model videos: " + model.getCantItems())
		var init:Number = model.getPos()		
		if(counter<cantIcons){
			//Must cast to complain the compiler
			holder = Holder(t.attachMovie("holder", "h"+counter, init+100, {_x:iconsP[counter].px, _y:iconsP[counter].py, id:init}))						
			if(state=="icons") holder.loadIcons(this, model.currentItem)						
			counter++
		} else { //fix iterator position when thumbnails finish to load
			var last:Number
			model.currentItem = last = model.getPos()-1
			t.output.text = (last+1)-cantIcons+" to "+last+" from "+model.getCantItems()
			//change to single state and load first page image
			setState("single")			
			t.initHolder.loadVideo(model.getItemAt((last+1)-cantIcons), model.getDurationAt((last+1)-cantIcons))
			//t.initHolder.change(model.getItemAt((last+1)-cantIcons))
		}

		if (model.getCantItems()<=1)
			holder._visible = false;
		if (model.getCantItems()<1)
		{
			hideNext();
			hidePrev();
			t.initHolder._visible = false;
			t.attachMovie("checkBackSoon", "checkBack", 51624, {_x:40, _y:20})
		}
	}
	//Hides next arrow
	private function hideNext():Void{
		t.forward._visible = false
	}
	//Shows next arrow
	private function showNext():Void{
		t.forward._visible = true
	}
	//Hides back arrow
	private function hidePrev():Void{		
		t.back._visible = false
	}
	//Shows back arrow
	private function showPrev():Void{
		t.back._visible = true
	}
	/*
	* called from arrows on stage or from createIcons trough controller, clear Icons on Stage
	* pos indicates next position (could be current, next or previous)
	* @param pos could be current, next or previous
	*/
	public function clearIcons(pos:String):Void{	
		//Stop the mediaDisplay
		t.initHolder.main.stop()
		var last:Number = (state=="single")?0 : counter+cantIcons
		//copy vars to clip timeline and make a reference
		t.counter=0; t.last = last; t.nextPos = pos;
		t.ref = this
		t.onEnterFrame = function(){				
			 this["h"+counter++].removeMovieClip()
			 if(counter==last) { //Finish to clear, now call makeIcons
				 delete this.onEnterFrame				 
				 if(this.ref.state!="single")  this.ref.makeIcons(this.nextPos);
			 }
		}
	}
	//Return current page
	private function getPage():Number{
		var page:Number
		var init:Number=model.getPos()
		var cont =  init%cantIcons				
		//The first or last on this page ... ?
		page=(cont>0)?Math.ceil(init/cantIcons) : Math.floor(init/cantIcons)
		//Fix zero on first page
		if(page==0) page = 1
		return page
	}
	//Clear icons on stage
	public function clearStage():Void{
			//Clear icons on stage
			var last:Number = counter+cantIcons
			//copy to clip timeline and make a reference
			t.counter=0; t.last = last;
			t.onEnterFrame = function(){				
				 this["h"+counter++].removeMovieClip()
				 if(counter==last) {
					 delete this.onEnterFrame
				 }
			}	
	}
	/*
	* getter-setter for state 
	* @param state could be single or icons
	*/
	private function setState(state:String):Void{
		this.state = state
	}
	public function getState():String{
	   return state
	}
}