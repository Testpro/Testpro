//This class receives an array to walk in
//Methods returns generic strings

class util.IteratorCat{
	 private var current:Number //current position of the current
	 private var lista:Array //filtered list of photos
	 private var nombres:Array //filtered list of names	 
	 private var cat:Array //lista de categories
	 private var photoNames:Array //total list of names
	 private var photoList:Array //total list of photos
	 
	 //Constructor
	 function IteratorCat(photos:Array, cats:Array, names:Array){	
		     this.cat = cats //list of categories			 
			 this.photoNames = names  //total list of names
			 this.photoList = photos //save the total list of photos not filtered			 
			 //Initialize lista and nombres whitout filter by default
			 lista = new Array()
			 nombres = new Array()
			 //Copy to avoid values by reference
			 var largo = photoList.length
             for(var i=0; i<largo; i++) {
				 lista[i] = photoList[i]
				 nombres[i] = photoNames[i]
			 }
	}
	function filter(ctg:String){
		//First position always empty
		lista.splice(1)
		nombres.splice(1)				
		var largo = photoList.length 		
		for(var i=0; i<largo; i++){				
		   if(cat[i]==ctg) {
			   lista.push(photoList[i])
			   nombres.push(photoNames[i])			   		   
		   }
		}				
	}
	//Positioning the cursor
	public function first():Void{
		current = 0;
	}
	public function last():Void{
		current = lista.length-1;
	}
	public function next():Void{		
		if(hasNext()) current++;
	}
	public function previous(){
		if (lista[current-1]!=undefined) current--;
	}	
	public function hasNext():Boolean{
		return lista[current+1]!=undefined;
	}
	//Return current position
	function getPos():Number{	
		return current
	}
	//Allows to get current item like item=SomeObject.currentItem instead of SomeObject.getcurrentItem()
	public function get currentItem():String{
	  return lista[current];
	}
	//Allows to set current item like SomeObject.currentItem=x instead of SomeObject.setcurrentItem(x)
	public function set currentItem(pos:Number):Void{
	 current = pos;
	}
	//Returns member at some position
	public function getItemAt(pos:Number):String{
		return lista[pos];
	}
	//Returns name of a member at some position
	public function getCurrentName():String{		
		return nombres[getPos()];
	}
	public function getCantItems(){
		return lista.length-1
	}
}