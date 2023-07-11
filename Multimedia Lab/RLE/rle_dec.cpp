#include <bits/stdc++.h>
using namespace std;

void doDecode(string str){
    ofstream dec_out("./dec.txt",ios::out);
    int i , j;

    for(i = 0 ; i < str.size() ; i += 2){
        int x = str[i+1];
        for(j = 0; j < x ; j++){
            dec_out.put(str[i]);
        }
    }

    dec_out.close();
}

int main(){
    ifstream enc_in("./enc.txt");

    string str;
    char ch , nxt , ch0;

    enc_in.get(ch0) , enc_in.get(nxt);
    
    while(enc_in.get(ch))
        str += ch;

    if(ch0 == '0'){
        ofstream dec_out("./dec.txt");
        dec_out << str;
        dec_out.close();
    }

    else 
        doDecode(str);

    enc_in.close();

    return 0;
}