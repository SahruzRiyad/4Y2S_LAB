#include <bits/stdc++.h>
using namespace std;

map<string,int> dict;

void create_dictionary(){
    string s;

    for(int i = 0 ; i < 127 ; i++){
        s += (char)i;
        dict[s] = i;
        s = "";
    }
}

string generateString(int val){
    string tmp;
    while(val > 127)
        tmp += (char)127 , val -= 127;
    tmp += (char)val;
    return tmp;
}

void doEncode(string str){
    ofstream out("./enc.txt");
    string s , tmp;
    int i , cnt = 128;

    s += str[0];
    for(i = 1; i < str.size(); i++){
        if(dict[s + str[i]] != 0)
            s = s + str[i];
        else{
            tmp = generateString(dict[s]);
            out << tmp;
            // cout<<dict[s]
            dict[s+str[i]] = cnt++;
            s = str[i]; 
        }
    }

    tmp = generateString(dict[s]);
    out << tmp;

    out.close();
}

int main(){
    ifstream in("./input.txt");

    create_dictionary();

    string str;
    char ch;
    
    while(in.get(ch))
        str += ch;
    
    doEncode(str);

    ifstream enc_in("./enc.txt",ios::binary);
    enc_in.seekg(0,ios::end);
    int sz = enc_in.tellg();

    double r = (float) str.size() / (float) sz;
    cout<<"Compression ratio: "<<setprecision(3)<<r<<endl;

    in.close();
    enc_in.close();

    return 0;
}