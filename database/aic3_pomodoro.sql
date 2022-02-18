drop database if exists aic3_pomodoro;
create database if not exists aic3_pomodoro;
use aic3_pomodoro;

create table Login(
	id int not null primary key auto_increment,
	usuario varchar(200) not null,
	senha varchar(300) not null
);

create table Disciplinas(
	id int not null primary key auto_increment,
	nome varchar(200) not null,
	descricao varchar(300),
    stats bool not null default false
);

create table Tarefas(
	id int not null primary key auto_increment,
    nome varchar(200) not null,
	descricao varchar(300),
    stats bool not null default false,
    id_disciplina_fk int not null,
    foreign key (id_disciplina_fk)
    references Disciplinas(id)
    on update cascade
    on delete restrict
);

create view select_login as 
select * from Login;

create view select_disciplinas as 
select * from Disciplinas;

create view select_tarefas as 
select * from Tarefas;

delimiter $$
create procedure cadastrar(usuario varchar(200), senha varchar(300))
begin
	insert into Login values(null, usuario, senha);
end;
$$ delimiter ;

delimiter $$
create procedure cadastrar_disciplinas(nome varchar(200), descricao varchar(300), stats bool)
begin
	insert into Disciplinas values(null, nome, descricao, stats);
end;
$$ delimiter ;

delimiter $$
create procedure cadastrar_tarefas(nome varchar(200), descricao varchar(300), stats bool, disciplina int)
begin
	insert into Tarefas values(null, nome, descricao, stats, disciplina);
end;
$$ delimiter ;

delimiter $$
create procedure atualizar_tarefa(id_tarefa int, stats_tarefa bool)
begin
	update Tarefas set stats = stats_tarefa where id = id_tarefa;
end;
$$ delimiter ;

delimiter $$
create procedure atualizar_disciplina(id_disciplina int, stats_disciplina bool)
begin
	update Disciplinas set stats = stats_disciplina where id = id_disciplina;
end;
$$ delimiter ;

delimiter $$
create procedure remover_tarefa(id_tarefa int)
begin
	delete from Tarefas where id = id_tarefa;
end;
$$ delimiter ;

call cadastrar('gabriel', '123');
call cadastrar_disciplinas('Matematica', 'Matematica ', false);
call cadastrar_tarefas('Fazer continha', 'contar ', false, 1);

select * from select_tarefas;