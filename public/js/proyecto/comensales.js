var ruta= 'http://localhost/RestauranteEjemplo/public';
var urlComensal=ruta+ '/apiComensal';

function init(){

new Vue ({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
	
	el:'#comensal',
	data:{
		comensal:[],
		rfc:'',
		nombre:'',
		apellido:'',
		correo:'',
		nickname:'',
		telefono:'',
		fecha:''
		
	},
	methods:{
		
		agregarComensal:function(){
		if (this.rfc==""|| this.nombre==""|| this.apellido==""|| this.correo==""
			|| this.nickname==""|| this.telefono==""||this.fecha=="") {
			alertify.set('notifier','position', 'top-right');
			alertify.warning("Rellena los Campos Obligatorios");
		}else{
		var comensal={
			rfc:this.rfc,
			nombre:this.nombre,
			apellido:this.apellido,
			correo:this.correo,
			nickname:this.nickname,
			telefono:this.telefono,
			fecha:this.fecha	
		};
		console.log(comensal);
		this.$http.post(urlComensal, comensal)
		.then(function(response){
			console.log(response);
			if (response.bodyText==0) {
			alertify.set('notifier','position', 'top-right');
			alertify.success("Usuario Agregado");
			var nueva= window.open("sesion","_self");
			}else if(response.bodyText==1){
				alertify.set('notifier','position', 'top-right');
			alertify.warning("Usuario con el mismo RFC");
				var nueva= window.open("error","_self");
			};
			this.salir();

		}
		)
		}
		},
		obligar:function(){
		alertify.set('notifier','position', 'top-right');
		alertify.warning("Campo Obligatorio");
		},
		salir:function(){
			this.rfc='';
			this.correo='';
			this.nombre='';
			this.apellido='';
			this.nickname='';
			this.telefono='';
			this.fecha='';
			
		},


	},
});
}
window.onload=init;