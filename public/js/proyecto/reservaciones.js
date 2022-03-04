var ruta= document.querySelector("[name=route]").value;
var urlMesas=ruta+ '/apiMesa';
var urlRestaurante=ruta + '/apiRestaurante';
var urlUbicacion=ruta + '/apiUbicacion';
var urlComensal=ruta+ '/apiComensal';
var urlReservacion=ruta+ '/apiReservacion';
function init(){

new Vue ({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
	
	el:'#reservacion',
	created:function(){
	this.getUbicaciones();
	this.getRestaurantes();
},
	data:{
		restaurantes:[],
		id_restaurante:'',
		ubicaciones:[],
		id_ubicacion:'',
		fecha:'',
		hora:'',
		factura:'',
		mesas:[],
		id_mesa:'',
		folio:moment().format('MMMM Do YYYY, h:mm:ss a'),
		
	},
	methods:{
		getUbicaciones:function(){
			this.$http.get(urlUbicacion)
			.then(function(json){
				this.ubicaciones = json.data;
			})
		},
		getRestaurantes:function(){
			this.$http.get(urlRestaurante)
			.then(function(json){
				this.restaurantes = json.data;
			})
		},
		getMesas:function(){
			if (this.id_ubicacion==""||this.id_restaurante=="") {
				alertify.set('notifier','position', 'top-right');
				alertify.warning("Rellena el restaurante y la ubicación que deseas");
			} else {
				var solicitud={
				id_ubicacion:this.id_ubicacion,
				id_restaurante:this.id_restaurante
				};
				this.$http.post(urlMesas, solicitud)
				.then(function(response){
				console.log(response);
				this.mesas = response.body;
				});
			}
		},		
		agregarReservacion:function(){
		
		if (this.id_mesa==""|| this.id_restaurante==""|| this.factura==""
			|| this.fecha==""|| this.id_ubicacion==""||this.hora=="") {
			alertify.set('notifier','position', 'top-right');
			alertify.warning("Rellena los Campos Obligatorios");
		}else{
		   if (this.hora>"22:30:00"||this.hora<"13:00:00") {
		   		alertify.set('notifier','position', 'top-right');
			alertify.warning("Nuestro Horario es de 13:00 a 22:30");
		   } else {
		   	var reservacion={
			folio:this.folio,
			hora:this.hora,
			fecha:this.fecha,
			id_mesa:this.id_mesa,
			factura:this.factura,
		};
		this.$http.post(urlReservacion ,reservacion)
		.then(function(response){
			alertify.alert('Su reservación tiene el folio', this.folio, function(){ 
				var nueva= window.open("bienvenida","_self");
				alertify.success('Ok'); 

			})	
		})
		   }
		}
		},
		


	},
});
}
window.onload=init;