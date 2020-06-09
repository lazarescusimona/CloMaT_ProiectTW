--------------------------------------------------------
--  File created - Sunday-May-31-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table UTILIZATORI
--------------------------------------------------------
drop table articole_preferate CASCADE CONSTRAINTS;
/
drop table rude CASCADE CONSTRAINTS;
/
drop table utilizatori CASCADE CONSTRAINTS;
/
drop table articole CASCADE CONSTRAINTS;
/
drop table meniu_filtrare CASCADE CONSTRAINTS;
/
drop table match_cromatic CASCADE CONSTRAINTS;
/
drop table match_material CASCADE CONSTRAINTS;
/

 CREATE TABLE "STUDENT"."UTILIZATORI" 
   (	"ID" int,
    "USERNAME" VARCHAR2(30 BYTE), 
	"PAROLA" VARCHAR2(70 BYTE), 
	"EMAIL" VARCHAR2(50 BYTE), 
	"DATA_NASTERII" DATE, 
	"SEX" VARCHAR2(10 BYTE), 
	"CONFIRMED_MAIL" NUMBER, 
	"VERIFICATION_KEY" VARCHAR2(70 BYTE),
    "TIP_UTILIZATOR" VARCHAR2(30 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
REM INSERTING into STUDENT.UTILIZATORI
SET DEFINE OFF;
Insert into STUDENT.UTILIZATORI (ID,USERNAME,PAROLA,EMAIL,DATA_NASTERII,SEX,CONFIRMED_MAIL,VERIFICATION_KEY, TIP_UTILIZATOR) values (1,'Roxana','d5d4172de318d6dc6c1ca52c8dcab618','salavastruroxanamaria@yahoo.com',to_date('08-SEP-99','DD-MON-RR'),'Female',1,'cc72e74145c1d7c7a2327ee6320c5b3d','user');
Insert into STUDENT.UTILIZATORI (ID,USERNAME,PAROLA,EMAIL,DATA_NASTERII,SEX,CONFIRMED_MAIL,VERIFICATION_KEY,TIP_UTILIZATOR) values (2,'Anamaria','276b6c4692e78d4799c12ada515bc3e4','ana.goldan@yahoo.com',to_date('10-SEP-99','DD-MON-RR'),'Female',1,'91f88f6815525bd9fdaa8f81a8cb9aba','user');
Insert into STUDENT.UTILIZATORI (ID,USERNAME,PAROLA,EMAIL,DATA_NASTERII,SEX,CONFIRMED_MAIL,VERIFICATION_KEY,TIP_UTILIZATOR) values (3	,'admin', '21232f297a57a5a743894a0e4a801fc3','lazarescu.simona12@yahoo.com',to_date('01-JUN-00', 'DD-MON-RR'),	'Female',1,	'3fdfe7b3002cf8e4d2e9cb37e50dc9e2','admin');
Insert into STUDENT.UTILIZATORI (ID,USERNAME,PAROLA,EMAIL,DATA_NASTERII,SEX,CONFIRMED_MAIL,VERIFICATION_KEY,TIP_UTILIZATOR) values (4	,'simona', '3506e1dff0db4e4d78412e2feb7c0a95','lazarescusimonam@gmail.com',to_date('01-JUN-00', 'DD-MON-RR'),'Female',	1	,'00e4944f42e783d314b56acd53e758bb','user');

commit;
--------------------------------------------------------
--  DDL for Index PKK
--------------------------------------------------------

  CREATE UNIQUE INDEX "STUDENT"."PKK" ON "STUDENT"."UTILIZATORI" ("USERNAME") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  Constraints for Table UTILIZATORI
--------------------------------------------------------

  ALTER TABLE "STUDENT"."UTILIZATORI" ADD CONSTRAINT "PKK" PRIMARY KEY ("USERNAME")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;


--------------------------------------------------------
--  File created - Sunday-May-31-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table ARTICOLE
--------------------------------------------------------



  CREATE TABLE "STUDENT"."ARTICOLE" 
   (	"ID" int, 
	"SEXUL" VARCHAR2(100 BYTE) DEFAULT NULL, 
	"EVENIMENT" VARCHAR2(100 BYTE) DEFAULT NULL, 
	"STIL" VARCHAR2(100 BYTE) DEFAULT NULL, 
	"ARTICOL_PATH" VARCHAR2(100 BYTE) DEFAULT NULL, 
	"CULOARE" VARCHAR2(100 BYTE) DEFAULT NULL, 
    "MATERIAL" VARCHAR2(100 BYTE) DEFAULT NULL,
	"TIP_PIESA" VARCHAR2(100 BYTE) DEFAULT NULL, 
	"ANOTIMP" VARCHAR2(100 BYTE) DEFAULT NULL
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
REM INSERTING into STUDENT.ARTICOLE
SET DEFINE OFF;
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (28,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images16.jpg','Albastru','In','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (29,'Femei','Inmormantare','Casual','http://localhost/CloMaT_ProiectTW/images/images10.jpg','Bej','In','Imbracaminte bottom','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (1,'Femei','Petrecere de Revelion','Casual','http://localhost/CloMaT_ProiectTW/images/photo5.jpg','Rosu','In','Outfit complet','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (2,'Femei','Petrecere de Revelion','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo3.jpg','Magenta','In','Outfit complet','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (3,'Barbati','Botez','Elegant','http://localhost/CloMaT_ProiectTW/images/photo2.jpg','Alb','In','Outfit complet','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (4,'Barbati','Inmormantare','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo11.jpg','Bordo','In','Outfit complet','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (5,'Femei','Inmormantare','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo6.jpg','Bordo','In','Outfit complet','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (10,'Femei','Botez','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo7.jpg','Rosu','In','Outfit complet','Iarna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (15,'Barbati','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/photo10.jpg','Magenta','In','Outfit complet','Iarna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (17,'Barbati','Plimbare pe plaja','Casual','http://localhost/CloMaT_ProiectTW/images/photo4.jpg','Verde','In','Outfit complet','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (18,'Femei','Petrecere de Revelion','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo9.jpg','Maro','In','Outfit complet','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (20,'Femei','Botez','Elegant','http://localhost/CloMaT_ProiectTW/images/download5.jpg','Negru','In','Imbracaminte bottom','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (22,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/download7.jpg','Visisniu','In','Incaltaminte','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (23,'Femei','Inmormantare','Elegant','http://localhost/CloMaT_ProiectTW/images/download8.jpg','Negru','In','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (27,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/imag8.jpg','Visisniu','In','Imbracaminte bottom','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (19,'Barbati','Plimbare pe plaja','Casual','http://localhost/CloMaT_ProiectTW/images/download.jpg','Verde','In','Imbracaminte top','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (21,'Femei','Plimbare pe plaja','Casual','http://localhost/CloMaT_ProiectTW/images/download6.jpg','Bej','In','Incaltaminte','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (24,'Femei','Inmormantare','Elegant','http://localhost/CloMaT_ProiectTW/images/download9.jpg','Negru','In','Accesorii','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (25,'Femei','Inmormantare','Elegant','http://localhost/CloMaT_ProiectTW/images/download10.jpg','Visisniu','In','Incaltaminte','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (26,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images12.jpg','Maro','In','Imbracaminte top','Vara');
commit;
--------------------------------------------------------
--  DDL for Index PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "STUDENT"."PK" ON "STUDENT"."ARTICOLE" ("ARTICOL_PATH") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  Constraints for Table ARTICOLE
--------------------------------------------------------

  ALTER TABLE "STUDENT"."ARTICOLE" ADD CONSTRAINT "PK" PRIMARY KEY ("ARTICOL_PATH")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;







--------------------------------------------------------
--  File created - Sunday-May-31-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table ARTICOLE_PREFERATE
--------------------------------------------------------



  CREATE TABLE "STUDENT"."ARTICOLE_PREFERATE" 
   (	"USERNAME" VARCHAR2(30 BYTE), 
	"ARTICOL_PATH" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
REM INSERTING into STUDENT.ARTICOLE_PREFERATE
SET DEFINE OFF;
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo3.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo10.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo11.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo9.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo2.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo3.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo4.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo5.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo6.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo7.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Anamaria','http://localhost/CloMaT_ProiectTW/images/photo7.jpg');
--------------------------------------------------------
--  Ref Constraints for Table ARTICOLE_PREFERATE
--------------------------------------------------------

  ALTER TABLE "STUDENT"."ARTICOLE_PREFERATE" ADD CONSTRAINT "PPKK" FOREIGN KEY ("USERNAME")
	  REFERENCES "STUDENT"."UTILIZATORI" ("USERNAME") ENABLE;
  ALTER TABLE "STUDENT"."ARTICOLE_PREFERATE" ADD CONSTRAINT "PPKKK" FOREIGN KEY ("ARTICOL_PATH")
	  REFERENCES "STUDENT"."ARTICOLE" ("ARTICOL_PATH") ENABLE;

--------------------------------------------------------
--  File created - Sunday-May-31-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table MENIU_FILTRARE
--------------------------------------------------------


  CREATE TABLE "STUDENT"."MENIU_FILTRARE" 
   (	"ID" int,
   "NUME_FILTRU" VARCHAR2(50 BYTE), 
	"SUBCATEGORII" VARCHAR2(500 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
REM INSERTING into STUDENT.MENIU_FILTRARE
SET DEFINE OFF;
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (1,'Sexul','Femei');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (2,'Sexul','Barbati');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (3,'Eveniment','Iesire casual');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (4,'Eveniment','Inmormantare');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (5,'Eveniment','Botez');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (6,'Eveniment','Plimbare pe plaja');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (7,'Eveniment','Petrecere de Revelion');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (8,'Culoare','Alb');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (9,'Culoare','Albastru');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (10,'Culoare','Bej');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (10,'Culoare','Bordo');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (11,'Culoare','Galben');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (11,'Culoare','Gri');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (12,'Culoare','Lavanda');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (13,'Culoare','Magenta');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (14,'Culoare','Maro');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (15,'Culoare','Negru');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (16,'Culoare','Portocaliu');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (17,'Culoare','Rosu');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (17,'Culoare','Roz');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (19,'Culoare','Trabuc deschis');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (18,'Culoare','Verde');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (19,'Culoare','Visisniu');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (19,'Material','Bumbac');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (19,'Material','In');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (19,'Material','Casmir');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (20,'Tip_Piesa','Imbracaminte top');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (20,'Tip_Piesa','Imbracaminte bottom');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (21,'Tip_Piesa','Incaltaminte');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (22,'Tip_Piesa','Accesorii');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (21,'Tip_Piesa','Outfit complet');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (23,'Anotimp','Primavara');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (24,'Anotimp','Vara');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (25,'Anotimp','Toamna');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (26,'Anotimp','Iarna');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (27,'Stil','Elegant');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (28,'Stil','Sportiv');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (29,'Stil','Casual');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (30,'Culoare','Mov');

commit;
--------------------------------------------------------
--  Constraints for Table MENIU_FILTRARE
--------------------------------------------------------

  ALTER TABLE "STUDENT"."MENIU_FILTRARE" MODIFY ("SUBCATEGORII" NOT NULL ENABLE);
  ALTER TABLE "STUDENT"."MENIU_FILTRARE" MODIFY ("NUME_FILTRU" NOT NULL ENABLE);
  
  
  


 CREATE TABLE "STUDENT"."RUDE" 
   (	"USERUTILIZATOR" VARCHAR2(50 BYTE), 
	"RUDA" VARCHAR2(50 BYTE)
   ) SEGMENT CREATION DEFERRED 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  TABLESPACE "USERS" ;
REM INSERTING into STUDENT.RUDE
SET DEFINE OFF;
Insert into STUDENT.RUDE (USERUTILIZATOR,RUDA) values ('Anamaria','Roxana');
Insert into STUDENT.RUDE (USERUTILIZATOR,RUDA) values ('Roxana','Anamaria');
--------------------------------------------------------
--  Constraints for Table RUDE
--------------------------------------------------------

  ALTER TABLE "STUDENT"."RUDE" MODIFY ("USERUTILIZATOR" NOT NULL ENABLE);
  ALTER TABLE "STUDENT"."RUDE" MODIFY ("RUDA" NOT NULL ENABLE);



 CREATE TABLE "STUDENT"."MATCH_CROMATIC" 
   (	"CULOARE" VARCHAR2(100 BYTE), 
	"CULOARE_MATCH" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
REM INSERTING into STUDENT.MATCH_CROMATIC
SET DEFINE OFF;
Insert into STUDENT.MATCH_CROMATIC (CULOARE,CULOARE_MATCH) values ('Rosu','Negru');
Insert into STUDENT.MATCH_CROMATIC (CULOARE,CULOARE_MATCH) values ('Negru','Rosu');



  CREATE TABLE "STUDENT"."MATCH_MATERIAL" 
   (	"MATERIAL" VARCHAR2(100 BYTE), 
	"MATERIAL_MATCH" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
REM INSERTING into STUDENT.MATCH_MATERIAL
SET DEFINE OFF;
Insert into STUDENT.MATCH_MATERIAL (MATERIAL,MATERIAL_MATCH) values ('In','Casmir');
Insert into STUDENT.MATCH_MATERIAL (MATERIAL,MATERIAL_MATCH) values ('Casmir','In');



drop trigger users_after_insert;
CREATE OR REPLACE TRIGGER users_after_insert
AFTER INSERT
   ON STUDENT.UTILIZATORI
DECLARE
   v_max int;
BEGIN
    select max(id) into v_max from STUDENT.UTILIZATORI;
    update STUDENT.UTILIZATORI set id=v_max+1 where id is null;
END users_after_insert;
/


drop trigger articole_after_insert;
CREATE OR REPLACE TRIGGER articole_after_insert
AFTER INSERT
   ON STUDENT.ARTICOLE
DECLARE
   v_max int;
BEGIN
    select max(id) into v_max from STUDENT.ARTICOLE;
    update STUDENT.ARTICOLE set id=v_max+1 where id is null;
END;
/

  drop trigger filtre_after_insert;
CREATE OR REPLACE TRIGGER filtre_after_insert
AFTER INSERT
   ON STUDENT.MENIU_FILTRARE
DECLARE
   v_max int;
BEGIN
    select max(id) into v_max from STUDENT.MENIU_FILTRARE;
    update STUDENT.MENIU_FILTRARE set id=v_max+1 where id is null;
END;
/


select * from articole;
select * from articole_preferate;
select * from meniu_filtrare;
select * from rude;
select * from utilizatori;
select * from match_cromatic;
select * from match_material;


commit;
