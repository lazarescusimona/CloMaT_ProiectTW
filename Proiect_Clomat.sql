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
drop table statistica_vizitatori cascade Constraints;
/

 CREATE TABLE "STUDENT"."UTILIZATORI" 
   (	"ID" int,
    "USERNAME" VARCHAR2(70 BYTE), 
	"PAROLA" VARCHAR2(70 BYTE), 
	"EMAIL" VARCHAR2(70 BYTE), 
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
   (	"ID" NUMBER(*,0), 
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
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (23,'Femei','Inmormantare','Elegant','http://localhost/CloMaT_ProiectTW/images/images81.jpg','Visisniu','Catifea','Incaltaminte','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (39,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images34.jpg','Negru','Matase','Imbracaminte top','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (40,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images3.jpg','Negru','Bumbac','Imbracaminte top','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (44,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images21.jpg','Albastru','Material Bijuterii	','Accesorii','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (45,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images91.jpg','Albastru','Catifea','Incaltaminte','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (47,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images881.jpg','Albastru','In','Imbracaminte bottom','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (48,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/imagey1.jpg','Albastru','Bumbac','Imbracaminte bottom','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (50,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/imawqges71.jpg','Albastru','Bumbac','Imbracaminte top','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (51,'Femei','Botez','Sportiv','http://localhost/CloMaT_ProiectTW/images/imagesxx1.jpg','Gri','Blana','Incaltaminte','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (53,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/download41.jpg','Negru','Dantela','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (54,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images771.jpg','Mov','Casmir','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (57,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/imagesasd1.jpg','Negru','Dantela','Imbracaminte top','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (58,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/imagesss1.jpg','Negru','Dantela','Imbracaminte bottom','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (59,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/downloa7781.jpg','Alb','Dantela','Imbracaminte bottom','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (61,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/imagestr1.jpg','Gri','Catifea','Imbracaminte top','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (62,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/imagesds1.jpg','Trabuc deschis','Matase','Imbracaminte bottom','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (63,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/downloadsdd1.jpg','Portocaliu','Matase','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (64,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/imagessdsd1.jpg','Albastru','Matase','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (1,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images16.jpg','Albastru','Catifea','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (2,'Femei','Inmormantare','Casual','http://localhost/CloMaT_ProiectTW/images/images10.jpg','Bej','Catifea','Imbracaminte bottom','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (3,'Femei','Petrecere de Revelion','Casual','http://localhost/CloMaT_ProiectTW/images/photo5.jpg','Rosu','Casmir','Outfit complet','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (4,'Femei','Petrecere de Revelion','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo3.jpg','Magenta','Bumbac','Outfit complet','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (5,'Barbati','Botez','Elegant','http://localhost/CloMaT_ProiectTW/images/photo2.jpg','Alb','Bumbac','Outfit complet','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (6,'Barbati','Inmormantare','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo11.jpg','Bordo','Casmir','Outfit complet','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (7,'Femei','Inmormantare','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo6.jpg','Bordo','Casmir','Outfit complet','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (8,'Femei','Botez','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo7.jpg','Rosu','Casmir','Outfit complet','Iarna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (9,'Barbati','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/photo10.jpg','Magenta','In','Outfit complet','Iarna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (11,'Barbati','Plimbare pe plaja','Casual','http://localhost/CloMaT_ProiectTW/images/photo4.jpg','Verde','In','Outfit complet','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (11,'Femei','Petrecere de Revelion','Sportiv','http://localhost/CloMaT_ProiectTW/images/photo9.jpg','Maro','In','Outfit complet','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (12,'Femei','Botez','Elegant','http://localhost/CloMaT_ProiectTW/images/download5.jpg','Negru','Bumbac','Imbracaminte bottom','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (13,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/download7.jpg','Visisniu','Piele','Incaltaminte','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (14,'Femei','Inmormantare','Elegant','http://localhost/CloMaT_ProiectTW/images/download8.jpg','Negru','Catifea','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (15,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/imag8.jpg','Visisniu','Bumbac','Imbracaminte bottom','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (16,'Barbati','Plimbare pe plaja','Casual','http://localhost/CloMaT_ProiectTW/images/download.jpg','Verde','Casmir','Imbracaminte top','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (17,'Femei','Plimbare pe plaja','Casual','http://localhost/CloMaT_ProiectTW/images/download6.jpg','Bej','Catifea','Incaltaminte','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (18,'Femei','Inmormantare','Elegant','http://localhost/CloMaT_ProiectTW/images/download9.jpg','Gri','Material Bijuterii','Imbracaminte top','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (19,'Femei','Inmormantare','Elegant','http://localhost/CloMaT_ProiectTW/images/download10.jpg','Visisniu','Piele','Accesorii','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (20,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images12.jpg','Maro','In','Imbracaminte top','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (21,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/download1.jpg','Negru','Bumbac','Imbracaminte bottom','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (22,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images22.jpg','Negru','Material Bijuterii','Accesorii','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (24,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/imagesd1.jpg','Visisniu','Bumbac','Incaltaminte','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (25,'Femei','Inmormantare','Elegant','http://localhost/CloMaT_ProiectTW/images/download81.jpg','Visisniu','Bumbac','Imbracaminte top','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (26,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images01.jpg','Visisniu','Matase','Imbracaminte top','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (27,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/download91.jpg','Negru','Matase','Imbracaminte bottom','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (28,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images71.jpg','Negru','Material Bijuterii','Accesorii','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (29,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images31.jpg','Bej','Piele','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (30,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images61.jpg','Bej','Catifea','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (31,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/download188.jpg','Bej','Bumbac','Imbracaminte top','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (32,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images781.jpg','Bej','Dantela','Imbracaminte top','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (34,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images6fd1.jpg','Bej','In','Imbracaminte bottom','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (35,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images18.jpg','Bej','Bumbac','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (36,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images861.jpg','Bej','Material Bijuterii','Accesorii','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (37,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/imagess71.jpg','Bej','Piele','Accesorii','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (42,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/download888.jpg','Visisniu','Piele','Imbracaminte bottom','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (33,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images891.jpg','Bej','Bumbac','Imbracaminte top','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (38,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/download54.jpg','Negru','Bumbac','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (41,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/download234.jpg','Visisniu','Material Bijuterii','Accesorii','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (65,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/downloadsd1.jpg','Negru','Piele','Imbracaminte bottom','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (43,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images7r81.jpg','Albastru','In','Accesorii','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (46,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images671.jpg','Albastru','Bumbac','Imbracaminte top','Vara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (49,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/imagh1.jpg','Albastru','Material Bijuterii','Accesorii','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (52,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/images9981.jpg','Verde','In','Incaltaminte','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (55,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/downloagg1.jpg','Negru','Piele','Imbracaminte top','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (56,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/downloadas1.jpg','Alb','Dantela','Imbracaminte top','Primavara');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (60,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/imagesss.jpg','Gri','Catifea','Imbracaminte bottom','Toamna');
Insert into STUDENT.ARTICOLE (ID,SEXUL,EVENIMENT,STIL,ARTICOL_PATH,CULOARE,MATERIAL,TIP_PIESA,ANOTIMP) values (66,'Femei','Plimbare pe plaja','Elegant','http://localhost/CloMaT_ProiectTW/images/downloaduu1.jpg','Mov','Piele','Imbracaminte top','Vara');
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
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo9.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo3.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo6.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/photo7.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Anamaria','http://localhost/CloMaT_ProiectTW/images/photo7.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Anamaria','http://localhost/CloMaT_ProiectTW/images/download41.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/download188.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Anamaria','http://localhost/CloMaT_ProiectTW/images/images861.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/download10.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/download54.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/download91.jpg');
Insert into STUDENT.ARTICOLE_PREFERATE (USERNAME,ARTICOL_PATH) values ('Roxana','http://localhost/CloMaT_ProiectTW/images/downloadas1.jpg');
commit;
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
   (	"ID" NUMBER(*,0), 
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
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (37,'Material','Material Bijuterii');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (32,'Material','Matase');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (35,'Material','Piele');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (36,'Material','Blana');
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
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (33,'Material','Dantela');
Insert into STUDENT.MENIU_FILTRARE (ID,NUME_FILTRU,SUBCATEGORII) values (34,'Material','Catifea');

commit;
--------------------------------------------------------
--  Constraints for Table MENIU_FILTRARE
--------------------------------------------------------

  ALTER TABLE "STUDENT"."MENIU_FILTRARE" MODIFY ("SUBCATEGORII" NOT NULL ENABLE);
  ALTER TABLE "STUDENT"."MENIU_FILTRARE" MODIFY ("NUME_FILTRU" NOT NULL ENABLE);
  
  
  

 CREATE TABLE "STUDENT"."RUDE" 
   (	"USERUTILIZATOR" VARCHAR2(50 BYTE), 
	"RUDA" VARCHAR2(50 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 
 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1
  BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
REM INSERTING into STUDENT.RUDE
SET DEFINE OFF;
Insert into STUDENT.RUDE (USERUTILIZATOR,RUDA) values ('Anamaria','Roxana');
Insert into STUDENT.RUDE (USERUTILIZATOR,RUDA) values ('Roxana','Anamaria');
commit;
--------------------------------------------------------
--  Constraints for Table RUDE
--------------------------------------------------------

  ALTER TABLE "STUDENT"."RUDE" MODIFY ("USERUTILIZATOR" NOT NULL ENABLE);
  ALTER TABLE "STUDENT"."RUDE" MODIFY ("RUDA" NOT NULL ENABLE);



 CREATE TABLE "STUDENT"."MATCH_CROMATIC" 
   (	"ID" NUMBER(*,0), 
	"CULOARE" VARCHAR2(100 BYTE), 
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
Insert into STUDENT.MATCH_CROMATIC (ID,CULOARE,CULOARE_MATCH) values (5,'Negru','Bej');
Insert into STUDENT.MATCH_CROMATIC (ID,CULOARE,CULOARE_MATCH) values (3,'Visisniu','Negru');
Insert into STUDENT.MATCH_CROMATIC (ID,CULOARE,CULOARE_MATCH) values (4,'Negru','Visisniu');
Insert into STUDENT.MATCH_CROMATIC (ID,CULOARE,CULOARE_MATCH) values (6,'Bej','Negru');
Insert into STUDENT.MATCH_CROMATIC (ID,CULOARE,CULOARE_MATCH) values (7,'Bej','Visiniu');
Insert into STUDENT.MATCH_CROMATIC (ID,CULOARE,CULOARE_MATCH) values (8,'Visiniu','Bej');
Insert into STUDENT.MATCH_CROMATIC (ID,CULOARE,CULOARE_MATCH) values (9,'Albastru','Bej');
Insert into STUDENT.MATCH_CROMATIC (ID,CULOARE,CULOARE_MATCH) values (10,'Bej','Albastru');
Insert into STUDENT.MATCH_CROMATIC (ID,CULOARE,CULOARE_MATCH) values (11,'Albastru','Negru');
Insert into STUDENT.MATCH_CROMATIC (ID,CULOARE,CULOARE_MATCH) values (12,'Negru','Albastru');
commit;


  CREATE TABLE "STUDENT"."MATCH_MATERIAL" 
   (	"ID" NUMBER(*,0), 
	"MATERIAL" VARCHAR2(100 BYTE), 
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
Insert into STUDENT.MATCH_MATERIAL (ID,MATERIAL,MATERIAL_MATCH) values (3,'Bumbac','Matase');
Insert into STUDENT.MATCH_MATERIAL (ID,MATERIAL,MATERIAL_MATCH) values (4,'Matase','Bumbac');
Insert into STUDENT.MATCH_MATERIAL (ID,MATERIAL,MATERIAL_MATCH) values (5,'Bumbac','Piele');
Insert into STUDENT.MATCH_MATERIAL (ID,MATERIAL,MATERIAL_MATCH) values (6,'Piele','Bumbac');
Insert into STUDENT.MATCH_MATERIAL (ID,MATERIAL,MATERIAL_MATCH) values (7,'Bumbac','Catifea');
Insert into STUDENT.MATCH_MATERIAL (ID,MATERIAL,MATERIAL_MATCH) values (8,'Catifea','Bumbac');
Insert into STUDENT.MATCH_MATERIAL (ID,MATERIAL,MATERIAL_MATCH) values (11,'Dantela','Piele');
Insert into STUDENT.MATCH_MATERIAL (ID,MATERIAL,MATERIAL_MATCH) values (12,'Piele','Dantela');
Insert into STUDENT.MATCH_MATERIAL (ID,MATERIAL,MATERIAL_MATCH) values (9,'Catifea','Piele');
Insert into STUDENT.MATCH_MATERIAL (ID,MATERIAL,MATERIAL_MATCH) values (10,'Piele','Catifea');
commit;



CREATE TABLE "STUDENT"."STATISTICA_VIZITATORI" 
   (	"ID" int,
    "ZIUA" DATE, 
	"NR_UTILIZATORI" int default 0 not null
   );
   
   insert into "STUDENT"."STATISTICA_VIZITATORI"(ID,ZIUA,NR_UTILIZATORI) values(1,to_date('06-JUN-20','DD-MON-RR'),15);
   insert into "STUDENT"."STATISTICA_VIZITATORI"(ID,ZIUA,NR_UTILIZATORI) values(2,to_date('07-JUN-20','DD-MON-RR'),25);
   insert into "STUDENT"."STATISTICA_VIZITATORI"(ID,ZIUA,NR_UTILIZATORI) values(3,to_date('08-JUN-20','DD-MON-RR'),10);
   insert into "STUDENT"."STATISTICA_VIZITATORI"(ID,ZIUA,NR_UTILIZATORI) values(4,to_date('09-JUN-20','DD-MON-RR'),30);
   --insert into "STUDENT"."STATISTICA_VIZITATORI"(ID,ZIUA,NR_UTILIZATORI) values(5,to_date('10-JUN-20','DD-MON-RR'),5);
   commit;

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


drop trigger match_culori_after_insert;
CREATE OR REPLACE TRIGGER match_culori_after_insert
AFTER INSERT
   ON STUDENT.MATCH_CROMATIC
DECLARE
   v_max int;
BEGIN
    select max(id) into v_max from STUDENT.MATCH_CROMATIC;
    update STUDENT.MATCH_CROMATIC set id=v_max+1 where id is null;
END;
/


drop trigger match_material_after_insert;
CREATE OR REPLACE TRIGGER match_material_after_insert
AFTER INSERT
   ON STUDENT.MATCH_MATERIAL
DECLARE
   v_max int;
BEGIN
    select max(id) into v_max from STUDENT.MATCH_MATERIAL;
    update STUDENT.MATCH_MATERIAL set id=v_max+1 where id is null;
END;
/
drop trigger vizitatori_after_insert;
CREATE OR REPLACE TRIGGER vizitatori_after_insert
AFTER INSERT
   ON STUDENT.STATISTICA_VIZITATORI
DECLARE
   v_max int;
BEGIN
    select max(id) into v_max from STUDENT.STATISTICA_VIZITATORI;
    update STUDENT.STATISTICA_VIZITATORI set id=v_max+1 where id is null;
END;
/


   
   
select * from articole;
select * from articole_preferate;
select * from meniu_filtrare;
select * from rude;
select * from utilizatori;
select * from match_cromatic;
select * from match_material;
select * from statistica_vizitatori;

commit;
