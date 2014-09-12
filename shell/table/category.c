#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "../db.h"

struct st_category{
	int category_id;
	char* name;
	int parent_id;
	int sort;
};

typedef struct st_category st_category;

static st_category record;

static char* sql;

void foreach_st_category(st_category st){
}


void getCategoryByID(int category_id,st_category *entity){
	// if(!category_id) return;
	// char *sql="SELECT * FROM ";
	// strcat(sql,DBPRE);
	// strcat(sql,"category WHERE category_id=");
	// char *cid[11];
	// itoa(category_id,cid);
	// strcat(sql,cid);
	const char *sql="SELECT c.category_id,name,parent_id,sort_order FROM oc_category c,oc_category_description cd WHERE c.category_id=cd.category_id AND c.category_id=1";
	MYSQL_ROW row=get(sql);
	// *entity={.category_id=atoi(row[0]),.name=row[1],.parent_id=atoi(row[2]),.sort=atoi(row[3])};
	entity->category_id=atoi(row[0]);
	entity->name=row[1];
	entity->parent_id=atoi(row[2]);
}

int updateCateogry(st_category *entity){
	int category_id=entity->category_id;
	sql="UPDATE oc_category SET ";
	return 1;
}


int check_necessnary_param(int argc,char** argv){
	return 1;
}

void cmd_arg_parse(int argc,const char** argv){
	for (int i = 0; i < argc; ++i)
	{
		if(!strcmp(argv[i],"--name")){
			record.name=(char *)argv[++i];
			continue;
		}
		if(!strcmp(argv[i],"--id")){
			record.category_id=atoi(argv[++i]);
			continue;
		}
		if(!strcmp(argv[i],"--parent_id")){
			record.parent_id=atoi(argv[++i]);
			continue;
		}
		// if(!strcmp(argv[i],"--is_parent")){
		// 	record.is_parent=atoi(argv[++i]);
		// 	continue;
		// }
		if(!strcmp(argv[i],"--sort")){
			record.sort=atoi(argv[++i]);
			continue;
		}
	}
	// st_category *entity=malloc(sizeof(st_category));
	// getCategoryByID(record.category_id,entity);
	MYSQL_ROW *rows=find("SELECT * FROM oc_category");
	printf("%s\n", rows[0][1]);
	printf("%s\n", rows[0][0]);
	// printf("%s\n", entity->name);
	// free(entity);
	printf("%s\n", "dddd");
	
}

int update_category(int argc,const char** argv){
	cmd_arg_parse(argc,argv);
	return 1;
}