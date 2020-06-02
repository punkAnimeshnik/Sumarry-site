var app = new Vue({
	el: '#app-0',	
	methods: {
		about: function () { window.scrollTo(pageXOffset, 2100)},
		menu: function () { window.scrollTo(pageXOffset, 3700)},
	},
})

var app = new Vue({
	el: '#app',
	data: {	position:"0",},	
	methods:{
		right:function() {
	   	position = this.position + 255;
				if (position > 0 ) {position = -2805}	
			this.position = position;},
		left:function() {
			position = this.position - 255;
				if (position < -2805) {	position = 0}
		  this.position = position}
	},
})
 
var app2 = new Vue({	
	 el: '#app-2',
   data: {
    ul: [false,false,false,false],
    color:['colorBlack','colorBlack','colorBlack','colorBlack'],
    iClass: ['fa fa-angle-down','fa fa-angle-down','fa fa-angle-down','fa fa-angle-down'],
    aboutUs:[
    				{ i: 0 ,name: "Our Restaurant provide best service ever to our customer", discript: "Injected humour, or randomised words which don't look evethe Internet tend to repeat predefined chunks as necessary, making this the first n slightly believable. If Lorem Ipsum, you need to be sure there isn't on the Internet tend to repeat tend to repeat predefined chunks as you.",},
    				{ i: 1 ,name: "We have best Restaurant food menu alltime", discript: "Injected humour, or randomised words which don't look evethe Internet tend to repeat predefined chunks as necessary, making this the first n slightly believable. If Lorem Ipsum, you need to be sure there isn't on the Internet tend to repeat tend to repeat predefined chunks as you.",},
    				{ i: 2 ,name: "Our Restaurant provide Home Delivary service to our customer", discript: "Injected humour, or randomised words which don't look evethe Internet tend to repeat predefined chunks as necessary, making this the first n slightly believable. If Lorem Ipsum, you need to be sure there isn't on the Internet tend to repeat tend to repeat predefined chunks as you.",},
    				{ i: 3 ,name: "Restaurant Located nearby your destination", discript: "Injected humour, or randomised words which don't look evethe Internet tend to repeat predefined chunks as necessary, making this the first n slightly believable. If Lorem Ipsum, you need to be sure there isn't on the Internet tend to repeat tend to repeat predefined chunks as you.",},
    ],
    i: 'fa fa-angle-down',},
    methods:{    	
  	Click: function(i) {  	
  		if (this.ul[(i)] === true) {
  			this.ul[(i)] = false,
  			this.color[(i)] = "colorBlack",
  			this.i = "fa fa-angle-down"
  		} else {
  			this.ul[(i)] = true,
  			this.color[(i)] = "colorBlue",
  			this.i = "fa fa-angle-up"
  		}},  		
  	},
})

var app3 = new Vue({
	el: '#app-3',
	data: {
		message:"FULL MENU",
		numb: '10',
		types: "",		
		menu:[
					{i: 1,name: "All", activing: "active", type: ""},
					{i: 2,name: "Breakfast", activing: "", type: "Breakfast"},
					{i: 3,name: "Lunch", activing: "", type: "Lunch"},
					{i: 4,name: "Dinner", activing: "", type: "Dinner"},
					{i: 5,name: "Disart", activing: "", type: "Disart"},
					{i: 6,name: "Kids Menu", activing: "", type: "Kids_Menu"},
					],
		dishs: [
		 {foto: "image/menu_2.jpg", name: "Chicken Burger", price:"6.50$", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Breakfast"},
 	   {foto: "image/menu_7.jpg", name: "Boneless Wings", price:"$12.40", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Lunch"},
		 {foto: "image/menu_8.jpg", name: "California Turkey", price:"$14.50", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Dinner"},
		 {foto: "image/menu_9.jpg", name: "House BBQ", price:"$18.30", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Disart"},
		 {foto: "image/menu_10.jpg", name: "Santa Fe Crispers", price:"$12.50", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Kids_Menu"},
		 {foto: "image/menu_11.jpg", name: "Crispy Fiery", price:"$6.90", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Breakfast"},
		 {foto: "image/menu_12.jpg", name: "Chicken Mex Bowl", price:"$11.40", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Lunch"},
		 {foto: "image/menu_13.jpg", name: "Pepper Pals", price:"$14.50", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Dinner"},
		 {foto: "image/menu_14.jpg", name: "Chocolate Cake", price:"$13.30", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Disart"},
		 {foto: "image/menu_15.jpg", name: "Triple Dipper", price:"$8.90", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Kids_Menu"},
		 {foto: "image/menu_1.jpg", name: "Smokehouse Combo", price:"8.50$",discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Breakfast"},			
		 {foto: "image/menu_3.jpg", name: "Ribs & Stickes", price:"11.80$", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Lunch"},
		 {foto: "image/menu_4.jpg", name: "Chicken Crisper", price:"9.50$", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Dinner"},
		 {foto: "image/menu_5.jpg", name: "Chicken Sandwich", price:"12.50$", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Disart"},
		 {foto: "image/menu_6.jpg", name: "Party Platter", price:"21.50$", discr: "Internet tend to repeat predefined chunks as necessary, making this Internet.", type:"Kids_Menu"},
		 ],			
	},
	methods: {
		fullMenu: function () {
			if (this.message == "FULL MENU") {
				this.numb = "20"
				this.message = "SHORT MENU"} 
				else {
				this.message = "FULL MENU"
				this.numb = '10'}
		},
		Click: function (id) {			
			for (item of this.menu) {				
					if (item.i !== (id)) {
				item.activing = ""} 
			else {
				this.types = item.type,
				item.activing = "active"}
			}
		},		
	},
	computed: {
			filtredType(){
				return this.dishs.filter(dishs => {	return dishs.type.indexOf(this.types) !== -1})}
	},
})
var app4 = new Vue({
	el: '#app-4',
	data:{
		display: false,
		Color: '#000',
	},
	methods:{
		click: function () {
			if (this.display === true) {
				this.display = false
				this.Color = "#000"}
				else {
				this.display = true
				this.Color = "#00c5d2"}
		}
	},	
})
var app5 = new Vue ({
	el: '#app-5',
	data:{
		display: false,
		hover:true,
		foto: "",},
	 methods: {
  	wheel: function(ev){
    	if (ev.deltaY < 0|| this.display == true) {
      	this.display = false,
      	this.hover = true;} 
    },
    Click: function (src) {
    	this.display = true,
    	this.hover = false,
    	this.foto = (src)},
    }	
})
var app6_1 = new Vue({
	el: '#app-6-1',
	data:{display: false},})
var app6 = new Vue({
	el: '#app-6',
	data:{display: false},})
var app7 = new Vue({
	el: '#app-7',
	data:{
		display: false,
    Id: "",},
	methods:{
		  comment: function (Id) {
    	this.display = true,
    	this.Id = (Id)},
	},
})