import util.*
import mvc.*
import video.*

//Position interface elements

this.attachMovie("flecha", "back", -100, {_x:85, _y:370, _xscale:50, _yscale:50})
this.attachMovie("flecha", "forward", -99, {_x:415, _y:370, _xscale:50, _yscale:50, _rotation:180})
this.attachMovie("soon", "coming", -98, {_x:250, _y:160, _xscale:100, _yscale:100, _rotation:0})

// COMMENTED TO HIDE TN NOS.
//this.attachMovie("paginas", "pag", -96, {_x:150, _y:3})
// TO CHANGE THE POSITION OF THE VIDEO HOLDER
initHolder._y-=60
initHolder.gotoAndStop(2)
init._holder._visible = false
//output._y = 325
//end of UI elements

model = new PhotoModelXml()
controller = new PhotoControllerColumns(model, this)
view = new PhotoViewColumns(model, controller, this)
controller.setView(view)
pag.setController(controller)
model.addObserver(view)
model.addObserver(pag)
model.addObserver(controller)
//Buttons handlers
back.onPress = function(){
	controller.icons("previous")
}
forward.onPress = function(){
	controller.icons("next")
}
back._visible = false

//Load inital data
model.loadData("videos.xml")
a = setInterval(function(){
	// IMTI - var b = view.setupIcons(no of tn in each row,no of rows to be displayed);
	var b = view.setupIcons(3,1);	
	if(b){	
		view.setState("icons")
		controller.icons("current")		
		clearInterval(a);
	}
}, 1000)
stop();