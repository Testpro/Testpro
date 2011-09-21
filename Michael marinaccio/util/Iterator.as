//This class receives an array to walk in
//Methods returns generic strings

class util.Iterator{
	 private var current:Number //current position of the current
	 private var lista:Array //lista to be walked
	 
	 //Constructor
	 function Iterator(lista:Array){
			 this.lista = lista			 
			 current = 0
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
	public function getCantItems(){
		return lista.length-1
	}
}