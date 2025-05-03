-- CREATE
INSERT INTO mantenimiento_info (id, nombre, texto, activo) VALUES (0, 'NOMBRE', 'TEXTO', true);
INSERT INTO categoria_servicio (id, nombre, imagen, texto, activo) VALUES (0, 'NOMBRE', 'URL IMAGEN', 'TEXTO', true);
INSERT INTO info_contacto (id, nombre, texto, texto_adicional, activo) VALUES (0, 'NOMBRE', 'TEXTO', 'TEXTO ADICIONAL', true);
INSERT INTO imagen (id, nombre, imagen, activo) VALUES (0, 'NOMBRE', 'URL IMAGEN', true);
INSERT INTO historia (id, tipo, texto, activo) VALUES (0, 'TIPO', 'TEXTO', true);
INSERT INTO historia_imagen (id, historia_id, imagen_id) VALUES (0, 0, 0);
INSERT INTO equipo (id, tipo, texto, activo) VALUES (0, 'TIPO', 'TEXTO', true);
INSERT INTO equipo_imagen (id, historia_id, imagen_id) VALUES (0, 0, 0);
INSERT INTO pregunta_frecuente (id, pregunta, respuesta, activo) VALUES (0, 'PREGUNTA', 'RESPUESTA', true);

-- READ
SELECT id, nombre, texto, activo FROM mantenimiento_info;
SELECT id, nombre, imagen, texto, activo FROM categoria_servicio;
SELECT id, nombre, texto, texto_adicional, activo FROM info_contacto;
SELECT id, nombre, imagen, activo FROM imagen;
SELECT id, tipo, texto, activo FROM historia;
SELECT id, historia_id, imagen_id FROM historia_imagen;
SELECT id, tipo, texto, activo FROM equipo;
SELECT id, historia_id, imagen_id FROM equipo_imagen;
SELECT id, pregunta, respuesta, activo FROM pregunta_frecuente;

-- UPDATE
UPDATE mantenimiento_info SET nombre = 'Nuevo nombre', texto = 'Nuevo texto' WHERE id = 0;
UPDATE categoria_servicio SET nombre = 'Nuevo nombre', imagen = 'Nueva url imagen', texto = 'Nuevo texto' WHERE id = 0;
UPDATE info_contacto SET nombre = 'Nuevo nombre', texto = 'Nuevo texto', texto_adicional = 'Nuevo texto adicional' WHERE id = 0;
UPDATE imagen SET nombre = 'Nuevo nombre', imagen = 'Nueva url imagen' WHERE id = 0;
UPDATE historia SET tipo = 'Nuevo tipo', texto = 'Nuevo texto' WHERE id = 0;
UPDATE historia_imagen SET historia_id = 'Nuevo id', imagen_id = 'Nuevo id' WHERE id = 0;
UPDATE equiop SET tipo = 'Nuevo tipo', texto = 'Nuevo texto' WHERE id = 0;
UPDATE equipo_imagen SET historia_id = 'Nuevo id', imagen_id = 'Nuevo id' WHERE id = 0;
UPDATE pregunta_frecuente SET pregunta = 'Nueva pregunta', respuesta = 'Nueva respuesta' WHERE id = 0;

-- DESACTIVATE
UPDATE mantenimiento_info SET activo = false WHERE id = 0;
UPDATE categoria_servicio SET activo = false WHERE id = 0;
UPDATE info_contacto SET activo = false WHERE id = 0;
UPDATE imagen SET activo = false WHERE id = 0;
UPDATE historia SET activo = false WHERE id = 0;
UPDATE equipo SET activo = false WHERE id = 0;
UPDATE pregunta_frecuente SET activo = false WHERE id = 0;


-- ACTIVATE
UPDATE mantenimiento_info SET activo = true WHERE id = 0;
UPDATE categoria_servicio SET activo = true WHERE id = 0;
UPDATE info_contacto SET activo = true WHERE id = 0;
UPDATE imagen SET activo = true WHERE id = 0;
UPDATE historia SET activo = true WHERE id = 0;
UPDATE equipo SET activo = true WHERE id = 0;
UPDATE pregunta_frecuente SET activo = true WHERE id = 0;

-- DELETE
DELETE FROM mantenimiento_info WHERE id = 0;
DELETE FROM categoria_servicio WHERE id = 0;
DELETE FROM info_contacto WHERE id = 0;
DELETE FROM imagen WHERE id = 0;
DELETE FROM historia WHERE id = 0;
DELETE FROM historia_imagen WHERE id = 0;
DELETE FROM equipo WHERE id = 0;
DELETE FROM equipo_imagen WHERE id = 0;
DELETE FROM pregunta_frecuente WHERE id = 0; 