import util.Observable;
import util.Iterator;

/**
* Represents the array of photos (i.e., the Model of the MVC triad).
*/
class FileSystem.PhotoModelFileSystem extends Observable 
{
	private var photos : Array
	private var current : Number = 0
	private var iterator : Iterator
	private var myData :LoadVars	
	/**
	* Constructor.
	*/
	public function PhotoModelFileSystem ()
	{		
		photos=new Array() //Array to receive loaded photos
		this.photos.push("") //Position 0 empty
	}
	/*
	* Sets an Iterator to walk this list. In th future we can add filters in the Iterator
	* @param list   An array of images
	*/
	public function setIterator(list:Array):Void{		
	  iterator = new Iterator (list)
	  currentItem= 1 //Position 0 empty
	}
	/*
	* Loads data from passed URL
	* @param URL  The url to load data from
	*/
	public function loadData (url : String) : Void
	{
		myData = new LoadVars ()
		myData.ref = this
		myData.onLoad = function (ok)
		{
			if (ok)
			{
				for (var i = 0;	i < this.cant; i ++)
				{
					this.ref.photos.push (this ["foto" + i])
				}
				//Sets iterator with loaded data
				this.ref.setIterator(this.ref.photos)
				//Notify observers thas data was loaded
				this.ref.setChanged()
				this.ref.notifyObservers({name:"loaded"})
			}
		}
		myData.load (url)
	}
	//Returns quantity of items
	public function getCantItems(){
		return photos.length-1 //first position empty to fix zero based counter
	}
	//Forward positioning to iterator
	public function first():Void{
		iterator.first();
	}
	public function last():Void{
		iterator.last();
	}
	//Forward positioning to iterator and broadcast change
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
	* Load a Photo and broadcast change
	*  @param nr The position of the image to be load
	*/
	public function loadPhoto(nr:Number):Void{
		currentItem = nr
		setChanged()
		notifyObservers({name:"loadPhoto", item:currentItem})
	}
	//Return current position
	function getPos():Number{		
		return iterator.getPos()
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
	/*
	* Return item at some position
	* @param pos The position of the returned item
	*/
	public function getItemAt(pos:Number):String{
		return iterator.getItemAt(pos)
	}
	/*
	* Filter items on this Model, based on categories
	* @param ctg is the category selected
	*/	
	public function filter(ctg:String){
		//No needed here, just to complain the compiler
		//iterator.filter(ctg)
	}
	// Return name of current item
	public function getCurrentName(){
		return photos[getPos()]
	}
}