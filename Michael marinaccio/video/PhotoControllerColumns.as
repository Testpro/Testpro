import video.PhotoModelXml
import video.PhotoViewColumns

class video.PhotoControllerColumns extends mvc.AbstractController{
	private var t:MovieClip
	private var model:PhotoModelXml
	private var view:PhotoViewColumns
	
	/*
	* Constructor
	* @param model is the model this controller is servicing
	* @param timeline is a reference to the timeline this controller is
	*/
	function PhotoControllerColumns(model :PhotoModelXml, timeline:MovieClip){
		t = timeline //reference to the timeline
		super.setModel(model) //sets the model
	}
	  /**
	   * Sets the view that this controller is servicing
	   *
	   */
	 public function setView (v:PhotoViewColumns):Void {			 
		view = v;
	  }
	/**
   * Returns this controller's view.
   */
  public function getView () :PhotoViewColumns {
    return view;
  }
  	/**
   * Returns this controller's model.
   */
  public function getModel ():PhotoModelXml {	  
    return model
  }
	//goto next page of icons
	public function forward (){	  
	 if(view["getState"]()=="single") model.next();
	 else icons("next")
	}
	//goto previous page of icons	
	public function backward (){
	 if(view["getState"]()=="single") model.previous();
	 else icons("previous")
	}
	/*
	*  Clear current icons
	*  @param pos could be current, previous or next
	*/
	public function icons (pos:String){
	  changeView("icons")		
	  view["clearIcons"](pos) 
	}
	/*
	* change state of view
	* @param state could be single or icons
	*/
	public function changeView(state:String):Void{			
			view["setState"](state)
	}
	/*
	* load a new photo
	* @param nr is the position of the photo to be loaded
	*/
	public function loadVideo(nr:Number):Void{			
			model.loadVideo(nr)
	}
	/*
	* Filter images based on data passed from a component (AS1 combobox)
	* @param comp is the component calling this function
	*/
	public function setFilter(comp){ 		
		model.filter(comp.getSelectedItem().data)
		model.first()
		view["setState"]("icons")
		icons("current")
	}
}