#include <bits/stdc++.h>
using namespace std;

map<char,int>frequency;
map<char,string>codes;

struct HuffmanNode{
    char symbol;
    int freq;
    HuffmanNode *left , *right;

    HuffmanNode(char symbol, int freq){
        this->symbol = symbol;
        this->freq = freq;
        left = right = nullptr;
    }
};

struct compareNodes{
    bool operator()(HuffmanNode* lhs , HuffmanNode* rhs) const{
        return lhs->freq > rhs->freq;
    }
};

void generateCode(HuffmanNode* root, string code){
    if(root == nullptr)
        return;
    
    if(root->symbol != '\0')
        codes[root->symbol] = code;

    generateCode(root->left,code+"0");
    generateCode(root->right,code+"1");
}

void doEncoding(string str){

    ofstream out("./enc.txt");
    priority_queue<HuffmanNode*,vector<HuffmanNode*>,compareNodes > pq;

    for(auto &itr : frequency)
        pq.push(new HuffmanNode(itr.first,itr.second));
    
    while(pq.size() > 1){
        HuffmanNode* left = pq.top();
        pq.pop();

        HuffmanNode* right = pq.top();
        pq.pop();

        HuffmanNode* parent = new HuffmanNode('\0',left->freq + right->freq);
        parent->left = left;
        parent->right = right;

        pq.push(parent);
    }

    generateCode(pq.top(),"");

    for(auto &itr: str)
        out<<codes[itr];
    
    out<<endl;

    for(auto &itr: codes)
        out<<itr.first<<' '<<itr.second<<endl;
    
    out.close();
}
int main(){
    ifstream in("./input.txt");

    string str;
    char ch;

    while(in.get(ch)){
        if(ch == '\n')
            ch = '-';
        str += ch;
        frequency[ch]++;
    }
    
    doEncoding(str);

    in.close();
    return 0;
}