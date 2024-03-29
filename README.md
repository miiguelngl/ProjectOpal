# ProjectOpal

## Índice
- [1. Introducción](#introduccion) 						 
- [2. Objetivos](#objetivos)  												  
- [3. Tecnologías escogidas y justificación](#tecnologias_escogidas)  						       	   	  
  - [3.1. Tecnologías escogidas y justificación](#tecnologias_escogidas_2)  			          	     		  
  - [3.2. Motor de bases de datos](#bases_datos)   						    		  
  - [3.3. Frameworks seleccionados](#frameworks_seleccionados)  						    		  
- [4. Diseño de la aplicación](#diseno)  	
(Falta terminar)									  
  - [4.1. Casos de uso](#casos_uso) 								     	  
  - [4.2. Diagrama entidad relacion](#modelo)  						    	  						  
- [5. Arquitectura de la aplicación]
(#arquitectura)  
 				         	   		 
  - [5 Estructura del proyecto](#estructura)  	
       		  
- [6. Manual de despliegue](#despliegue)   			
			
  - [6.1. Requisitos hardware y software aplicables](#requisitos)  			   		  
   			  									       

<a name="introduccion"></a>						     		
## 1. Introducción 	
 Consiste en un sitio web de compra-venta de zapatillas de estilo urbano. Los usuarios podrían comprar o vender estos productos en nuestra página web. 

La aplicación se desarrolla en web, de forma que los usuarios podrán acceder a ella sin necesidad de instalar software en su equipo informático y con el único requisito de tener un navegador web y una conexión a internet. 
## 2. Objetivos 
<a name="objetivos"></a>
La razón de la elaboración de este proyecto viene dada por 3 razones importantes : 
1- Aportar una ayuda con el reciclaje al medioambiente.
2-Ayudar a las personas a deshacerse de zapatillas en buen estado que ya no suelen usar.
3- Facilitar el acceso a la compra de zapatillas en buen estado que en otras tiendas estan a precios mucho mas elevados.

Con la introducción de esta aplicación en la empresa se obtendrán múltiples beneficios tales como un acceso a datos sencillo sin necesidad de almacen fisico.Ademas de una mayor posibilidad de dar a conocer la empresa y sus utilidades.  												 
<a name="tecnologias_escogidas"></a>
## 3. Funcionalidades y tecnologias  

Funcionalidades: 
- `Anónimo`: Podrán acceder a la página principal de la aplicación dentro de la cuál podrán conocer los servicios ofrecidos por la empresa, así como otros datos referentes a la misma(pero no podran ni vender ni comprar productos)

- `Usuario:` Podrán acceder mediante una autenticación a sus datos de carácter personal y podrán interactuar con la misma dependiendo del rol específico de cada uno. Los usuarios podrán ser:
Tecnologias: 
- `Cliente:` Quien podrá explorar el catálogo, comprar productos de otros clientes y vender productos:Tecnologias: 

(Al entrar el usuario cliente a la aplicacion tendra 2 apartados con un solo click )

`Apartado de comprador:` Al usuario le aparecerá un catálogo de los pTecnologias: roductos que se venden en la tienda. 

`Apartado de vendedor:` El usuario podrá subir productos con una pequeña descripcion del producto y un precio sugTecnologias: erido para el administrador ,ademas añadir al menos una fotografía de las zapatillas que se ponen a la venta. (Esta  no se pone a la venta hasta que el usuario administrador acepta todo producto )
  
- `Administrador:` Es el encargado del mantenimiento principal de la aplicación, gestión de clientes, validacion de subida de productos (Si acepta el precio otorgado por el cliente y el estado del producto) y respuestas a consultas de los clientes
 						       	   	  
<a name="tecnologias_escogidas_2"></a>
### 3.1. Tecnologías escogidas y justificación 
La aplicación se desarrolla usando lenguajes de servidor PHP y lenguajes cliente javascript. 			          	     		 

Cabe mencionar que todo el software utilizado es libre, con lo que la empresa tendrá un considerable ahorro en concepto de licencias. El software seleccionado no lo ha sido sólo por  gratuito, sino porque además es unas de las tecnologías más utilizada en la actualidad en el desarrollo de aplicaciones web debido a su fiabilidad y a su versatilidad. 

(#frameworks_seleccionados)
<a name="bases_datos"></a>
### 3.2. Motor de bases de datos 
El motor de bases de datos usado es `MySql`. Las razones de su elección son las siguientes:
- Su adquisición es gratuita, lo que permite reducción de costes para el cliente.
- Es multiplataforma para Windows, Linux y Mac (los sistemas operativos más extendidos) con lo cual se podrá disponer él en cualquiera de estos.
- Es un motor muy extendido en la comunidad de desarrolladores, con lo que conseguir ayuda es muy sencillo.
- La labor de mantenimiento de una base de datos MySql es muy fácil debido a que presenta menos funciones frente a otros sistemas gestores. Esto, aunque pueda parecer una desventaja, tiene a su favor que el mantenimiento de la aplicación lo puede llevar el propio desarrollador, sin tener que recurrir a un administrador de bases de datos.
- Es escalable, lo cual nos da una ventaja con vistas al futuro. 						    		  
<a name="frameworks_seleccionados"></a>
### 3.3. Frameworks seleccionados
 Hemos seleccionado Bootstrap por su amplia gama de componentes predefinidos, facilita la creación rápida de interfaces atractivas. Su sistema de cuadrícula flexible permite diseños estructurados, asegurando coherencia en diversos dispositivos. La personalización es sencilla, ya que se pueden ajustar estilos y componentes según las necesidades. Ofrece compatibilidad con varios navegadores y su documentación extensa facilita el aprendizaje y solución de problemas. Con una comunidad activa, Bootstrap se actualiza regularmente, garantizando seguridad y mejoras.
<a name="diseno"></a>						    		  
## 4. Diseño de la aplicación 	
<a name="diagramas"></a>									  
### 4.1. Casos de uso (ajustar al nuestro)
![Caso-uso](./img/CU.jpg)
<a name="modelo"><a>									     	  						 
### 4.2. Modelo de dominio 			
![Entidad Relacion](./img/ER.png)
	
<a name="despliegue"></a>	
###6. Para desplegar la pagina web y el servidor en AWS se ha tenido que hacer : 
- 1 Creacion de VPC : Se ha creado una VPC con 2 redes publicas y 2 redes privadas 2 AZ, sin NAT ni S3 Gateway
![VPC](./img/VPC.png)
- 2 Creacion de EC2 : AMI Ubuntu contiene el par de claves vockey , esta conectada a la red OPAL subred public1 tiene ip publica y de grupo de seguridad tiene SSH ,hhtp y MySQL/Aurora. Ademas se ha instalado apache2 PHP y MySQL 
![Instancia1](./img/EC2-1.png)
![Instancia2](./img/EC2-2.png)
![Instancia3](./img/EC2-3.png)
- 3 Creacion de la RDS : 
Conectividad:
* No se conecte a un recurso informático EC2
* Vpac Opal
* Acceso público: NO
* Creado nuevo grupo de seguridad: database_SG
![RDS](./img/RDS.png)

## 6. Manual de despliegue 
<a name="requisitos"></a> 										 
### 6.1. Requisitos hardware y software aplicables 	
- Hardware:
  - 2.00 GB de RAM.
  - 3.00 GB de espacio libre en disco duro.

- Navegadores soportados en móviles ([1](#1)) 
  
    |         | Chrome | Firefox | Safari |
    | :------ |:------:| :-----: | :----: |
    | Android | X      | X       | -      |
    | iOS     | X      | X       | X      |
    

  - Navegadores soportados en Pc ([2](#2))
  
    |         | Chrome | Firefox | Opera | Safari |
    | :------ |:------:| :-----: | :---: | :----: |
    | Mac     | X      | X       | X     | X      |
    | Windows | X      | X       | X     | -      |
    | Linux   | X      | X       | X     | -      |		  

 
;
	
				     		  