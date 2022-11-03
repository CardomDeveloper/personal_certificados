SELECT 
td_curso_usuario.curd_id,
tm_curso.cur_id,
tm_curso.cur_nombre,
tm_curso.cur_descripcion,
tm_curso.cur_fechaini,
tm_curso.cur_fechfin,
tm_usuario.usu_id,
tm_usuario.usu_nombre,
tm_usuario.usu_apellidop,
tm_usuario.usu_apellidom,
tm_instructor.inst_id,
tm_instructor.inst_nombre,
tm_instructor.inst_apellidop,
tm_instructor.inst_apellidom
FROM td_curso_usuario INNER JOIN tm_curso ON td_curso_usuario.cur_id = tm_curso.cur_id
INNER JOIN tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id
INNER JOIN tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
WHERE
td_curso_usuario.usu_id = 1;