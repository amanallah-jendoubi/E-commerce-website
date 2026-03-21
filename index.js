let tab=[
    {id:"eyrfu" ,num:0},
    {id:"rkn",num:1},
    {id:"fjg",num:2}
]

for (let i in tab){
    console.log(tab[i].id);
}

let newTab=[];
for (let i in tab){
    if(tab[i].num==1){
        newTab.push(tab[i]);
    }
}
console.log(newTab);