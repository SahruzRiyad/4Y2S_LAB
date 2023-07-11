#include <bits/stdc++.h>
using namespace std;

map<int,string> dict;

void create_dictionary(){
    string s;

    for(int i = 0 ; i < 127 ; i++){
        s += (char)i;
        dict[i] = s;
        s = "";
    }
}

int generateValue(int &i , string &str){
    int ans = 0;
    while(i<str.size() && str[i] == (char)127)
        ans += 127, i++;

    ans += (int)str[i];
    return ans;
}

void doDecode(string str){
    ofstream out("./dec.txt");
    string s , tmp , entry;
    int i , cnt = 128;

    s = "";

    for(i = 0 ; i < str.size() ; i++){
        int k = generateValue(i,str);
        entry = dict[k];

        if(entry == "")
            entry = s + s[0];

        out << entry;

        if(!s.empty())
            dict[cnt++] = s + entry[0];
        
        s = entry;
    }

    out.close();
}

int main(){
    ifstream in("./enc.txt");

    create_dictionary();

    string str;
    char ch;
    
    while(in.get(ch))
        str += ch;
 
    doDecode(str);

    in.close();

    return 0;
}