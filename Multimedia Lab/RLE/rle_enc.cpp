#include <bits/stdc++.h>
using namespace std;

int doEncode(string str){
    ofstream enc_out("./enc.txt",ios::out);
    int cnt = 1 , i , sz = 2;
    enc_out << '1' << endl;
    
    for(i = 1 ; i < str.size() ; i++){
        if(str[i] == str[i-1] && cnt < 256)
            cnt++;
        else 
            enc_out.put(str[i-1]),enc_out.put(cnt) , cnt = 1 , sz += 2;
    }
    enc_out.put(str[i-1]),enc_out.put(cnt);

    enc_out.close();
    return sz;
}

int main(){
    ifstream enc_in("./input.txt");

    string str;
    char ch;

    while(enc_in.get(ch))
        str += ch;

    int sz = doEncode(str);

    double r = (float)str.size() / (float)sz;

    cout<<"Compression ratio: "<< setprecision(3)<<r<<endl;

    if(r < 1.0){
        cout<<"compression ratio < 1.0, so compression is not applicable"<<endl;
        ofstream enc_out("./enc.txt");
        enc_out << '0' << endl;
        enc_out << str;
    }

    enc_in.close();

    return 0;
}