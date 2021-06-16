SELECT idhabilidad,idobstetra,dni,email,password,fecha_colegiatura,fecha_registro,codigo FROM dbobstetras.habilidad;
use dbobstetras;
SELECT habilidad.idhabilidad,LPAD(habilidad.idobstetra,6,'0'),registro.nombre as nombre,
concat(registro.apellido_paterno," ",registro.apellido_materno) as apellidos,
habilidad.dni,habilidad.email,habilidad.password,
habilidad.fecha_colegiatura,habilidad.fecha_registro,habilidad.codigo 
FROM habilidad
inner join registro 
on habilidad.idobstetra=registro.cop;

select * from habilidad;