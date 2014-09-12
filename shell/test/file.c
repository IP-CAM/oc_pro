#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(int argc,char **argv){
	char *newfile="/testfile.txt";
	FILE *fp=fopen(newfile,"r");
	if(fp==NULL){
		return 0;
	}
	fprintf(fp, "%s\n", "error reporting");
	int o=puts("sfasdfsfdfff");
	printf("%d\n", o);
	fclose(fp);

	char *longstring="i hope i can find a likely girl";
	printf("%s\n", longstring+8);
}