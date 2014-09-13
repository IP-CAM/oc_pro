#include <stdio.h>
#include <stdlib.h>
#include <string.h>

void usage(const char* usage_string){
	printf("%s\n", usage_string);
	exit(0);
}

int start_with(char *str,char *pre){
	// int len=strlen(str),prelen=strlen(pre);
	// if(len<prelen) return 0;
	// char str2[prelen];
	// strncpy(str2,str,prelen);
	// return !strcmp(str2,pre);
	for (;;str++,pre++)
	{
		if(!*pre){
			return 0;
		}else if(*str!=*pre){
			return -1;
		}
	}
}

int end_with(char *str,char *suffix){
	int len=strlen(str),suflen=strlen(suffix);
	if(len<suflen) return 0;
	return !strcmp(str+len-suflen,suffix);
}

char *strpad(char *str,int total,const char *padding){
	if(strlen(str)>=total) return str;
	for (int i = strlen(str); i < total; ++i)
	{
		strcat(str,padding);
	}
	return str;
}