DROP TABLE articole CASCADE CONSTRAINTS;
/
create table articole (
     id int primary key,
     tip_sex varchar2(100),
     tip_eveniment  varchar2(100),
     tip_stil varchar2(100),
     articol_path varchar2(100),
     culoare varchar2(100),
     tip_piesa varchar2(100),
     tip_anotimp varchar2(100)
)
/

select * from articole;
/
SET SERVEROUTPUT ON;
DECLARE
  TYPE varr IS VARRAY(1000) OF varchar2(100);
  lista_tip_eveniment varr := varr('Iesire casual','Inmormantare','Botez','Plimbare pe plaja','Petrecere de Revelion');
  lista_tip_stil varr := varr('Casual','Elegant','Sportiv');
  lista_tip_sex varr := varr('Femei','Barbati');
  --artocl path cu random pana la max nr poze (11)
  lista_culoare varr := varr('Alb','Albastru','Bordo','Galben','Lavanda','Magenta','Maro','Negru','Portocaliu','Rosu','Verde','Visiniu');
  lista_tip_piesa varr := varr('Imbracaminte','Incaltaminte','Accesorii');
  lista_tip_anotimp varr := varr('Primavara','Vara','Toamna','Iarna');
  
  v_sex varchar2(100);
  v_tip_eveniment  varchar2(100);
  v_tip_stil varchar2(100);
  v_articol_path varchar2(100);
  v_culoare varchar2(100);
  v_tip_piesa varchar2(100);
  v_tip_anotimp varchar2(100);
  v_numar number(4);  
BEGIN
 for v_i in 1..60 loop
   v_sex := lista_tip_sex(TRUNC(DBMS_RANDOM.VALUE(0,lista_tip_sex.count))+1);
   v_tip_eveniment := lista_tip_eveniment(TRUNC(DBMS_RANDOM.VALUE(0,lista_tip_eveniment.count))+1);
   v_tip_stil := lista_tip_stil(TRUNC(DBMS_RANDOM.VALUE(0,lista_tip_stil.count))+1);
   select TRUNC(DBMS_RANDOM.VALUE(0,11))+1 into v_numar from dual;
   v_articol_path := 'images\photo'||to_char(v_numar)||'.jpg';
   v_culoare := lista_culoare(TRUNC(DBMS_RANDOM.VALUE(0,lista_culoare.count))+1);
   v_tip_piesa := lista_tip_piesa(TRUNC(DBMS_RANDOM.VALUE(0,lista_tip_piesa.count))+1);
   v_tip_anotimp := lista_tip_anotimp(TRUNC(DBMS_RANDOM.VALUE(0,lista_tip_anotimp.count))+1);
   insert into articole values (v_i, v_sex, v_tip_eveniment, v_tip_stil, v_articol_path, v_culoare, v_tip_piesa, v_tip_anotimp);
 end loop;
end;
/

 

select * from articole;
/