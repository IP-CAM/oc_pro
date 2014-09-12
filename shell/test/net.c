#include <stdio.h>
#include <netdb.h>

int main(int argc,char** argv){

	struct hostent *ent=gethostbyname("local.yicker");
	printf("%s\n", ent->h_addr_list[0]);
	printf("%d\n", ent->h_addrtype);
}