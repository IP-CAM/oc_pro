#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "common.h"
#include "model.h"
#include "db.h"
#include "array.h"


const char* about_select_usage="about select -t|--table table-name --select  <options>";

int check_cmd_args(int argc,const char **argv){
	if(!in_array("--table",argv,argc) && !in_array("-t",argv,argc)){
		usage(about_select_usage);
	}
	return 1;
}

int cmd_select(int argc,const char **argv){
	// check necessary param
	check_cmd_args(argc,argv);

	st_select_sql *stsql=(st_select_sql*)malloc(sizeof(st_select_sql));
	char where[256]={};
	while(*argv){
		if(!strcmp(*argv,"--table") || !strcmp(*argv,"-t")){
			argv++;
			stsql->from=*argv;
			argv++;
		}else if(!strcmp(*argv,"--select")){
			argv++;
			stsql->select=*argv;
			argv++;
		}else if(!start_with(*argv,"--")){
			const char *name=*argv+2;
			argv++;
			const char *value=*argv;
			cat_sql_where(name,value,where);
			argv++;
		}else{
			argv++;
		}
	}
	stsql->where=where;
	char sql[512];
	parse_select_sql(stsql,sql);
	dict_t **res=find(sql);
	for (int i = 0, rows=dict_size(*res); i < rows; ++i)
	{
		char *k, *v;
		
		for (int j = 0,fields=dict_size(res[i]); j < fields; ++j)
		{
			dict_get(*(res+i*rows+j),k,(void**)v);
			printf("%s\n", v);
		}
	}
	// st_sql_cell cell=res->cell;
	// while(*cell){
	// 	printf("%s\n", *cell->field);
	// 	cell++;
	// }
	// for (int i = 0, count=res->rows; i < count; ++i)
	// {
	// 	for(int j=0,fields=res->fields; j<fields; j++){
	// 		printf("%s\n", res->cell[i][j].field);
	// 		printf("%s\n", res->cell[i][j].value);
	// 	}
	// }
	// for (int i = 0; i < count(res); ++i)
	// {
	// 	printf("%s\n", rows[i][0]);
	// 	printf("%s\n", rows[i][1]);
	// }
	return 0;
}