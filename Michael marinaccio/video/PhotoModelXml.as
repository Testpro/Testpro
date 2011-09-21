import util.Observable;
import util.IteratorCat;
/**
* Represents the array of photos (i.e., the Model of the MVC triad).
*/
class video.PhotoModelXml extends Observable 
{
	private var videos : Array //array of videos
	private var videoNames:Array //names of videos
	private var videoCat:Array //category of videos
	private var videoDur:Array //duration of videos
	private var current : Number //current image
	private var iterator : IteratorCat //iterator used in this class
	private var myData :XML	//data holder
	/**
	* Constructor.
	*/
	public function PhotoModelXml ()
	{
		//build by default an Iterator passing this list as the reference
		videos=new Array()
		videoNames=new Array()
		videoCat=new Array()
		videoDur=new Array()
		videos.push("") //Position 0 empty
		videoNames.push("")
		videoCat.push("")
		videoDur.push("")
	}
	/**
	* sets the Iterator for this model
	* @param list is an array of images
	* @param cat is an array of categories 
	* Both are passed from the loadData method
	*/	
	public function setIterator(list:Array, cat:Array, names:Array):Void{		
	  iterator = new IteratorCat (list, cat, names)
	  currentItem= 1
	}
	/*
	* Loads data from passed URL
	* @param URL  The url to load data from
	*/
	public function loadData (url : String) : Void
	{
		var i : Number //for loops		
		myData = new XML ()
		myData.ignoreWhite = true
		var owner = this
		myData.onLoad = function (ok)
		{
			if (ok)
			{
				var root = this.firstChild.childNodes				
				var cant = root.length				
				for (var i = 0;	i < cant; i ++)
				{					
					owner.videos.push (root[i].attributes.src)
					owner.videoNames.push (root[i].attributes.title)
					owner.videoCat.push(root[i].attributes.cat)
					owner.videoDur.push(root[i].attributes.size)
				}
				//Pass values to the  Iterator				
				owner.setIterator(owner.videos, owner.videoCat, owner.videoNames)				
				owner.setChanged()				
				owner.notifyObservers({name:"loaded"})				
			}
		}
		myData.load (url)
	}
	//Return quantity of items in this Model
	public function getCantItems(){
		return iterator.getCantItems()
	}
	/*
	* Filter items on this Model, based on categories
	* @param ctg is the category selected
	*/
	public function filter(ctg:String){
		iterator.filter(ctg)
	}
	//Forward positioning to iterator
	public function first():Void{
		iterator.first();
	}
	public function last():Void{
		iterator.last();
	}
	public function next():Void{		
		iterator.next();
		setChanged()
		notifyObservers({name:"next", item:currentItem})
	}
	public function previous():Void{
		iterator.previous();
		setChanged()
		notifyObservers({name:"previous", item:currentItem})		
	}
	//Indicate if the collection have one more element
	public function hasNext():Boolean{
		return iterator.hasNext()
	}
	/*
	* Load a Video and broadcast change
	*  @param nr The position of the image to be load
	*/
	public function loadVideo(nr):Void{		
		currentItem = nr		
		setChanged()
		trace("video loaded")
		notifyObservers({name:"loadVideo", item:currentItem})
	}
	/*
	* Allows to set current item like SomeObject.cursorItem=x instead of SomeObject.setcursorItem(x)
	* @param pos The position to set as the current item
	*/
	public function set currentItem(pos:Number):Void{
	    iterator.currentItem = pos
	}
	//Return current item
	public function get currentItem():String{		
	  return iterator.currentItem
	}	
	// Return name of current item
	public function getCurrentName(){
		return iterator.getCurrentName()
	}
	// Return duration of current item
	public function getDuration():Number{
		return videoDur[getPos()]
	}
	//Return current position
	public function getPos():Number{		
		return iterator.getPos()
	}
	/*
	* Return item at some position
	* @param pos The position of the returned item
	*/
	public function getItemAt(pos:Number):String{
		return iterator.getItemAt(pos)
	}
	/*
	* Return item duration at some position
	* @param pos The position of the returned item
	*/
	public function getDurationAt(pos:Number):Number{
		return videoDur[pos]
	}
}