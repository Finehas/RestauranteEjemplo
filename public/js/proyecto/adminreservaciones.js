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
	this.getReservacion();
	this.getMesa();
},
	data:{
		restaurantes:[],
		id_restaurante:'',
		reservaciones:[],
		ubicaciones:[],
		id_ubicacion:'',
		fecha:'',
		hora:'',
		id_reservacion:'',
		factura:'',
		mesas:[],
		id_mesa:'',
		buscar:'',
		folio:moment().format('MMMM Do YYYY, h:mm:ss a'),
		
	},
	methods:{
		getReservacion:function(){
		this.$http.get(urlReservacion)
		.then(function(response)
			{	console.log(response);
				this.reservaciones=response.data;
			})
		},
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
		getMesa:function(){
			this.$http.get(urlMesas)
			.then(function(json){
				this.mesas = json.data;
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
		editarReservacion:function(){
		
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
			hora:this.hora,
			fecha:this.fecha,
			id_mesa:this.id_mesa,
			factura:this.factura,
		};
		this.$http.put(urlReservacion +'/'+ this.id_reservacion, reservacion)
		.then(function(response){
			alertify.alert('Su reservación fue corregida con exito', this.folio, function(){ 
				var nueva= window.open("bienvenida2","_self");
				alertify.success('Cambios guardados con exito');
		})	   
		})
		}
		}
		},
		editReservacion:function(id){
		$('#edit_Reservacion').modal('show');
		this.$http.get(urlReservacion + '/' + id)
		.then(function(response){
			console.log(response);
			this.id_reservacion= response.data.id_reservacion;
			this.id_mesa=response.data.id_mesa;
			this.fecha=response.data.fecha;
			this.hora=response.data.horario;
			this.id_restaurante=response.data.mesa.restaurante.id_restaurante;
			this.id_ubicacion= response.data.mesa.ubicacion.id_ubicacion;
			this.factura=response.data.factura;
		});
	},
		

	},
	computed:{
		filtroReservacion:function(){
				console.log(this.reservaciones);
			return this.reservaciones.filter((res)=>{			
				return res.rfc.toLowerCase().match(this.buscar.trim().toLowerCase()) ||
					   res.folio.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
			
		}
	}
});
}
window.onload=init;