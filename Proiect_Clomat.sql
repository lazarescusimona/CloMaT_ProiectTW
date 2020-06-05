--------------------------------------------------------
--  File created - Sunday-May-31-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table UTILIZATORI
--------------------------------------------------------
drop table utilizatori CASCADE CONSTRAINTS;
/


  CREATE TABLE "STUDENT"."UTILIZATORI" 
   (	"ID" int,
    "USERNAME" VARCHAR2(30 BYTE), 
	"PAROLA" VARCHAR2(70 BYTE), 
	"EMAIL" VARCHAR2(50 BYTE), 
	"DATA_NASTERII" DATE, 
	"SEX" VARCHAR2(10 BYTE), 
	"CONFIRMED_MAIL" NUMBER, 
	"VERIFICATION_KEY" VARCHAR2(70 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
REM INSERTING into STUDENT.UTILIZATORI
SET DEFINE OFF;
Insert into STUDENT.UTILIZATORI (ID,USERNAME,PAROLA,EMAIL,DATA_NASTERII,SEX,CONFIRMED_MAIL,VERIFICATION_KEY) values (1,'Roxana','d5d4172de318d6dc6c1ca52c8dcab618','salavastruroxanamaria@yahoo.com',to_date('08-SEP-99','DD-MON-RR'),'Female',1,'cc72e74145c1d7c7a2327ee6320c5b3d');
Insert into STUDENT.UTILIZATORI (ID,USERNAME,PAROLA,EMAIL,DATA_NASTERII,SEX,CONFIRMED_MAIL,VERIFICATION_KEY) values (2,'Anamaria','276b6c4692e78d4799c12ada515bc3e4','ana.goldan@yahoo.com',to_date('10-SEP-99','DD-MON-RR'),'Female',1,'91f88f6815525bd9fdaa8f81a8cb9aba');
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

drop trigger users_after_insert;

CREATE OR REPLACE TRIGGER users_after_insert
AFTER INSERT
   ON STUDENT.UTILIZATORI
DECLARE
   v_max int;
BEGIN

    select max(id) into v_max from STUDENT.UTILIZATORI;
    
    update STUDENT.UTILIZATORI set id=v_max+1 where id is null;

END;





--------------------------------------------------------
--  File created - Sunday-May-31-2020   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Table ARTICOLE
--------------------------------------------------------
drop table articole CASCADE CONSTRAINTS;
/


  CREATE TABLE "STUDENT"."ARTICOLE" 
   (	"ID" NUMBER(10,0), 
	"SEXUL" VARCHAR2(100 BYTE) DEFAULT NULL, 
	"EVENIMENT" VARCHAR2(100 BYTE) DEFAULT NULL, 
	"STIL" VARCHAR2(100 BYTE) DEFAULT NULL, 
	"ARTICOL_PATH" VARCHAR2(100 BYTE) DEFAULT NULL, 
	"CULOARE" VARCHAR2(100 BYTE) DEFAULT NULL, 
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
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP) values (1,'Femei','Petrecere de Revelion','Casual','http://localhost/CloMaT_ProiectTW/images/photo5.jpg','Rosu','Incaltaminte','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP) values (2,'Femei','Petrecere de Revelion','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo3.jpg','Magenta','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP) values (3,'Barbati','Botez','Elegant','http://localhost/CloMaT_ProiectTW/images/photo2.jpg','Alb','Accesorii','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP) values (4,'Barbati','Inmormantare','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo11.jpg','Bordo','Accesorii','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP) values (5,'Femei','Inmormantare','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo6.jpg','Bordo','Accesorii','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP) values (10,'Femei','Botez','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo7.jpg','Rosu','Incaltaminte','Iarna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP) values (15,'Barbati','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/photo10.jpg','Magenta','Accesorii','Iarna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP) values (17,'Barbati','Plimbare pe plaja','Casual','http://localhost/CloMaT_ProiectTW/images/photo4.jpg','Verde','Accesorii','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,TIP_PIESA,ANOTIMP) values (18,'Femei','Petrecere de Revelion','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo9.jpg','Maro','Imbracaminte','Vara');
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

drop table articole_preferate CASCADE CONSTRAINTS;
/

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
drop table meniu_filtrare CASCADE CONSTRAINTS;
/

  CREATE TABLE "STUDENT"."MENIU_FILTRARE" 
   (	"ID" int,
   "NUMEFILTRU" VARCHAR2(50 BYTE), 
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
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (1,'Sexul','Femei');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (2,'Sexul','Barbati');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (3,'Eveniment','Iesire casual');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (4,'Eveniment','Inmormantare');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (5,'Eveniment','Botez');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (6,'Eveniment','Plimbare pe plaja');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (7,'Eveniment','Petrecere de Revelion');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (8,'Culoare','Alb');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (9,'Culoare','Albastru');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (10,'Culoare','Bordo');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (11,'Culoare','Galben');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (12,'Culoare','Lavanda');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (13,'Culoare','Magenta');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (14,'Culoare','Maro');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (15,'Culoare','Negru');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (16,'Culoare','Portocaliu');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (17,'Culoare','Rosu');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (18,'Culoare','Verde');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (19,'Culoare','Visisniu');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (20,'Tip_Piesa','Imbracaminte');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (21,'Tip_Piesa','Incaltaminte');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (22,'Tip_Piesa','Accesorii');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (23,'Anotimp','Primavara');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (24,'Anotimp','Vara');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (25,'Anotimp','Toamna');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (26,'Anotimp','Iarna');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (27,'Stil','Elegant');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (28,'Stil','Sportiv');
Insert into STUDENT.MENIU_FILTRARE (ID,NUMEFILTRU,SUBCATEGORII) values (29,'Stil','Casual');
commit;
--------------------------------------------------------
--  Constraints for Table MENIU_FILTRARE
--------------------------------------------------------

  ALTER TABLE "STUDENT"."MENIU_FILTRARE" MODIFY ("SUBCATEGORII" NOT NULL ENABLE);
  ALTER TABLE "STUDENT"."MENIU_FILTRARE" MODIFY ("NUMEFILTRU" NOT NULL ENABLE);
  
  
  
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


  
  
  
  select id from utilizatori;
  select * from meniu_filtrare;
