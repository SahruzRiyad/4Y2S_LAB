#include <bits/stdc++.h>
using namespace std;

map<string,char>codes;

void doEncoding(string code){
    ofstream out("./dec.txt");

    string tmp, ans;

    for(int i = 0; i < code.size() ; i++){
        tmp += code[i];

        if(codes[tmp]){
            ans += (codes[tmp] == '-')? '\n' : codes[tmp];
            tmp = "";
        }
    }

    out << ans;
    out.close();
}
int main(){
    ifstream in("./enc.txt");

    string str, code;

    getline(in,code);

    while(getline(in,str))
        codes[str.substr(2)] = str[0];
    
    doEncoding(code);

    in.close();
    return 0;
}