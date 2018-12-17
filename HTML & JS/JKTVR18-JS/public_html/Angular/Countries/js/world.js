var world=[
    {
        name:"Estonia",        
        population:1300456,
        capital:"Tallinn",
        cities:[
            {
                name:"K-Järve",
                population:155000
            },
            {
                name:"Johvi",
                population:10000
            }
        ],
        languages:[
            {
                name:"Estonian",
                isOffical:true
            },
            {
                name:"Russian",
                isOffical:false
            }
        ]
    },
    {
        name:"Russian Federation",       
        population:143000000,
        capital:"Moscow",
        cities:[            
            {
                name:"Sankt-Petersburg",
                population:5000000
            },
            {
                name:"Kazan",
                population:1200000
            },
			{
                name:"Kaluga",
                population:1150000
            },
        ],
        languages:[
            {
                name:"Russian",
                isOffical:true
            }
        ]
    }
];

//-----------------------------Обработка
var app=angular.module('worldApp',[]);//ng-app
app.controller('worldCtr',function($scope){
    $scope.title='World Countries';
    //--------Подключение массива
    $scope.countries=world;
});