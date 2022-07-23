
/* Script based on the data model - https://app.dbdesigner.net/ */

CREATE TABLE "public.institution" (
	"inst_id" serial NOT NULL,
	"name" varchar(255) NOT NULL UNIQUE,
	"address" varchar(255) NOT NULL,
	"description" varchar(500) NOT NULL,
	"location" varchar(1000) NOT NULL,
	CONSTRAINT "institution_pk" PRIMARY KEY ("inst_id")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "public.person" (
	"person_id" serial NOT NULL,
	"person_name" varchar(255) NOT NULL,
	"person_email" varchar(255) NOT NULL,
	CONSTRAINT "person_pk" PRIMARY KEY ("person_id")
) WITH (
  OIDS=FALSE
);



CREATE TABLE "public.comment" (
	"comm_id" serial NOT NULL,
	"comm_text" varchar(500) NOT NULL,
	"inst_id_fk" int NOT NULL,
	"person_id_fk" int NOT NULL,
	CONSTRAINT "comment_pk" PRIMARY KEY ("comm_id")
) WITH (
  OIDS=FALSE
);





ALTER TABLE "comment" ADD CONSTRAINT "comment_fk0" FOREIGN KEY ("inst_id_fk") REFERENCES "institution"("inst_id");
ALTER TABLE "comment" ADD CONSTRAINT "comment_fk1" FOREIGN KEY ("person_id_fk") REFERENCES "person"("person_id");