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
	stsql->select="*";
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
	MYSQL_RES *res=select(sql);
	print_sql_result(res);
	// dict_t **res=find(sql);
	// for (int i = 0, rows=20; i < rows; ++i)
	// {
	// 	char *k, *v;
		
	// 	for (int j = 0,fields=dict_size(*res); j < fields; ++j,res++)
	// 	{
	// 		while(dict_iter(*res,&k,(void**)&v)){
	// 			printf("%s => %s\n", k, v);
	// 		}
	// 	}
	// }
	return 0;
}