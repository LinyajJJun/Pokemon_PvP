<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Display</title>
    <style>
        body {
            position: relative;
            min-height: 100vh;
            margin: 0px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            background-image: url('background.jpg');
            background-size: cover;
        }
        
        img {
            width: 10%;
            height: 100px;
            border: 5px solid transparent; /* Set a transparent border by default */
            transition: transform 0.3s ease, border 0.3s ease; /* Include border in the transition */
        }
        
        img:hover {
            transform: scale(1.1);
            border: 5px solid rgb(192, 44, 44); /* Change to a solid border on hover */
        }
        
        .image-container {
            width: 100%;
            position: absolute;
            bottom: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        
    </style>
    <script>
        var skills = [
            { 
                name: "Normal", 
                counter: [""], 
                weakness: ["Fighting"], 
                resistance: ["Ghost"] 
            },
            { 
                name: "Fighting", 
                counter: ["Dark", "Ice", "Rock", "Steel", "Normal"], 
                weakness: ["Flying", "Psychic", "Fairy"], 
                resistance: ["Rock", "Dark", "Bug"] 
            },
            { 
                name: "Flying",
                counter: ["Grass", "Fighting", "Bug"],
                weakness: ["Electric", "Ice", "Rock"],
                resistance: ["Ground", "Fighting", "Grass", "Bug"] 
            },
            { 
                name: "Poison",
                counter: ["Grass", "Fairy"],
                weakness: ["Ground", "Psychic"], 
                resistance: ["Steel", "Fairy", "Fighting", "Grass", "Bug"] 
            },
            { 
                name: "Ground", 
                counter: ["Fire", "Electric", "Poison", "Rock", "Steel"], 
                weakness: ["Water", "Grass", "Ice"], 
                resistance: ["Electric", "Rock", "Poison"] 
            },
            { 
                name: "Rock",
                counter: ["Fire", "Ice", "Bug", "Flying"], 
                weakness: ["Water", "Grass", "Fighting", "Ground", "Steel"],
                resistance: ["Normal", "Fire", "Poison", "Flying"] 
            },
            { 
                name: "Bug", 
                counter: ["Psychic", "Grass", "Dark"], 
                weakness: ["Fire", "Flying", "Rock"], 
                resistance: ["Ground", "Fighting", "Grass"] 
            },
            { 
                name: "Ghost", 
                counter: ["Ghost", "Psychic"], 
                weakness: ["Ghost", "Dark"], 
                resistance: ["Normal", "Fighting", "Bug", "Poison"] 
            },
            { 
                name: "Steel", 
                counter: ["Fairy", "Rock", "Ice"], 
                weakness: ["Fire", "Flying", "Rock"], 
                resistance: ["Poison", "Normal", "Ice", "Fairy", "Rock", "Flying", "Grass", "Psychic", "Steel", "Dragon", "Bug"] 
            },
            { 
                name: "Fire", 
                counter: ["Bug", "Grass", "Ice", "Steel"], 
                weakness: ["Water", "Ground", "Rock"], 
                resistance: ["Fire", "Ice", "Fairy", "Grass", "Steel", "Bug"] 
            },
            { 
                name: "Water", 
                counter: ["Fire", "Ground", "Rock"], 
                weakness: ["Electric", "Grass"], 
                resistance: ["Water", "Fire", "Ice", "Steel"] 
            },
            { 
                name: "Grass", 
                counter: ["Water", "Rock", "Ground"], 
                weakness: ["Water", "Ground", "Grass", "Electric"], 
                resistance: ["Water", "Ground", "Grass", "Electric"] 
            },
            { 
                name: "Electric", 
                counter: ["Flying", "Water"], 
                weakness: ["Ground"], 
                resistance: ["Flying", "Electric", "Steel"] 
            },
            { 
                name: "Psychic", 
                counter: ["Fighting", "Poison"], 
                weakness: ["Bug", "Ghost", "Dark"], 
                resistance: ["Fighting", "Psychic"] 
            },
            { 
                name: "Ice", 
                counter: ["Dragon", "Flying", "Grass", "Ground"], 
                weakness: ["Fire", "Fighting", "Rock", "Steel"], 
                resistance: ["Ice"] 
            },
            { 
                name: "Dragon", 
                counter: ["Dragon"], 
                weakness: ["Ice", "Dragon", "Fairy"], 
                resistance: ["Water", "Fire", "Grass", "Electric"] 
            },
            { 
                name: "Dark", 
                counter: ["Ghost", "Psychic"], 
                weakness: ["Fighting", "Bug", "Fairy"], 
                resistance: ["Psychic", "Ghost", "Dark"] 
            },
            { 
                name: "Fairy", 
                counter: ["Dark", "Dragon", "Fighting"], 
                weakness: ["Poison", "Steel"], 
                resistance: ["Dragon", "Fighting", "Dark", "Bug"] 
            }
        ];
        var pokemonData = [
        {
            name: "Abra",
            hp: 25,
            attack: 20,
            defense: 15,
            speed: 90,
            types: ["Psychic"],
            skills: [35, 39, 6, 51],
        },
        {
            name: "Blastoise",
            hp: 79,
            attack: 83,
            defense: 100,
            speed: 78,
            types: ["Water"],
            skills: [9, 48, 44, 41],
        },
        {
            name: "Blaziken",
            hp: 80,
            attack: 120,
            defense: 70,
            speed: 80,
            types: ["Fire", "Fighting"],
            skills: [10, 26, 13, 37],
        },
        {
            name: "Bulbasaur",
            hp: 45,
            attack: 49,
            defense: 49,
            speed: 45,
            types: ["Grass", "Poison"],
            skills: [8, 32, 2, 33],
        },
        {
            name: "Charizard",
            hp: 78,
            attack: 84,
            defense: 78,
            speed: 100,
            types: ["Fire", "Flying"],
            skills: [10, 15, 41, 38],
        },
        {
            name: "Charmander",
            hp: 39,
            attack: 52,
            defense: 43,
            speed: 65,
            types: ["Fire"],
            skills: [10, 33, 0, 22],
        },
        {
            name: "Clefable",
            hp: 95,
            attack: 70,
            defense: 73,
            speed: 60,
            types: ["Fairy"],
            skills: [52, 35, 39, 10],
        },
        {
            name: "Dragonite",
            hp: 91,
            attack: 134,
            defense: 95,
            speed: 80,
            types: ["Dragon", "Flying"],
            skills: [40, 0, 19, 23],
        },
        {
            name: "Electivire",
            hp: 75,
            attack: 123,
            defense: 67,
            speed: 95,
            types: ["Electric"],
            skills: [19, 10, 47, 43],
        },
        {
            name: "Exeggutor",
            hp: 95,
            attack: 95,
            defense: 85,
            speed: 55,
            types: ["Grass", "Psychic"],
            skills: [35, 8, 0, 32],
        },
        {
            name: "Garchomp",
            hp: 108,
            attack: 130,
            defense: 95,
            speed: 102,
            types: ["Dragon", "Ground"],
            skills: [33, 40, 43, 31],
        },
        {
            name: "Gardevoir",
            hp: 68,
            attack: 65,
            defense: 65,
            speed: 80,
            types: ["Psychic", "Fairy"],
            skills: [35, 52, 19, 6],
        },
        {
            name: "Gengar",
            hp: 60,
            attack: 65,
            defense: 60,
            speed: 110,
            types: ["Ghost", "Poison"],
            skills: [39, 32, 23, 30],
        },
        {
            name: "Gyarados",
            hp: 95,
            attack: 125,
            defense: 79,
            speed: 81,
            types: ["Water", "Flying"],
            skills: [9, 0, 43, 40],
        },
        {
            name: "Hydreigon",
            hp: 92,
            attack: 105,
            defense: 90,
            speed: 98,
            types: ["Dark", "Dragon"],
            skills: [44, 42, 33, 48],
        },
        {
            name: "Lucario",
            hp: 70,
            attack: 110,
            defense: 70,
            speed: 90,
            types: ["Fighting", "Steel"],
            skills: [27, 48, 4, 31],
        },
        {
            name: "Machamp",
            hp: 90,
            attack: 130,
            defense: 80,
            speed: 55,
            types: ["Fighting"],
            skills: [26, 31, 37, 45],
        },
        {
            name: "Magneton",
            hp: 50,
            attack: 60,
            defense: 95,
            speed: 70,
            types: ["Electric", "Steel"],
            skills: [20, 48, 1, 35],
        },
        {
            name: "Mamoswine",
            hp: 110,
            attack: 130,
            defense: 80,
            speed: 80,
            types: ["Ice", "Ground"],
            skills: [33, 24, 46, 29],
        },
        {
            name: "Marowak",
            hp: 60,
            attack: 80,
            defense: 110,
            speed: 45,
            types: ["Ground"],
            skills: [34, 12, 22, 46],
        },
        {
            name: "Meowth",
            hp: 40,
            attack: 45,
            defense: 35,
            speed: 90,
            types: ["Normal"],
            skills: [1, 53, 44, 34],
        },
        {
            name: "Metagross",
            hp: 80,
            attack: 135,
            defense: 130,
            speed: 70,
            types: ["Steel", "Psychic"],
            skills: [49, 35, 25, 28],
        },
        {
            name: "Mewtwo",
            hp: 106,
            attack: 110,
            defense: 90,
            speed: 130,
            types: ["Psychic"],
            skills: [36, 27, 39, 24],
        },
        {
            name: "Onix",
            hp: 35,
            attack: 45,
            defense: 160,
            speed: 70,
            types: ["Rock", "Ground"],
            skills: [47, 38, 1, 34],
        },
        {
            name: "Pidgeot",
            hp: 83,
            attack: 80,
            defense: 75,
            speed: 101,
            types: ["Normal", "Flying"],
            skills: [13, 50, 1, 17],
        },
        {
            name: "Pikachu",
            hp: 35,
            attack: 55,
            defense: 40,
            speed: 90,
            types: ["Electric"],
            skills: [19, 3, 47, 21],
        },
        {
            name: "Ponyta",
            hp: 50,
            attack: 85,
            defense: 55,
            speed: 90,
            types: ["Fire"],
            skills: [11, 1, 47, 18],
        },
        {
            name: "Salamence",
            hp: 95,
            attack: 135,
            defense: 80,
            speed: 100,
            types: ["Dragon", "Flying"],
            skills: [40, 15, 11, 9],
        },
        {
            name: "Sandslash",
            hp: 75,
            attack: 100,
            defense: 110,
            speed: 65,
            types: ["Ground"],
            skills: [34, 28, 16, 31],
        },
        {
            name: "Sceptile",
            hp: 70,
            attack: 85,
            defense: 65,
            speed: 120,
            types: ["Grass"],
            skills: [7, 41, 28, 16],
        },
        {
            name: "Scizor",
            hp: 70,
            attack: 130,
            defense: 100,
            speed: 65,
            types: ["Bug", "Steel"],
            skills: [16, 46, 26, 14],
        },
        {
            name: "Snorlax",
            hp: 160,
            attack: 110,
            defense: 65,
            speed: 30,
            types: ["Normal"],
            skills: [2, 24, 11, 20],
        },
        {
            name: "Squirtle",
            hp: 44,
            attack: 48,
            defense: 65,
            speed: 43,
            types: ["Water"],
            skills: [9, 43, 1, 25],
        },
        {
            name: "Swampert",
            hp: 100,
            attack: 110,
            defense: 90,
            speed: 60,
            types: ["Water", "Ground"],
            skills: [9, 33, 29, 23],
        },
        {
            name: "Togekiss",
            hp: 85,
            attack: 95,
            defense: 85,
            speed: 120,
            types: ["Fairy", "Flying"],
            skills: [15, 51, 27, 50],
        },
        {
            name: "Weezing",
            hp: 65,
            attack: 90,
            defense: 120,
            speed: 60,
            types: ["Poison"],
            skills: [51, 32, 20, 11],
        },
    ];
        var skill = [
               {//normal
                   id: 0,
                   name: "破壞死光",
                   power: 150,
                   types: ["Normal"]
               },
               {
                   id: 1,
                   name: "猛撞",
                   power: 90,
                   types: ["Normal"]
               },
               {
                   id: 2,
                   name: "泰山壓頂",
                   power: 85,
                   types: ["Normal"]
               },
               {
                   id: 3,
                   name: "電光一閃",
                   power: 40,
                   types: ["Normal"]
               },
               {
                   id: 4,
                   name: "神速",
                   power: 80,
                   types: ["Normal"]
               },
               {
                   id: 5,
                   name: "泰山壓頂",
                   power: 85,
                   types: ["Normal"]
               },//normal
               {//grass
                   id: 6,
                   name: "能量球",
                   power: 90,
                   types: ["Grass"]
               },
               {
                   id: 7,
                   name: "葉刃",
                   power: 90,
                   types: ["Grass"]
               },
               {
                   id: 8,
                   name: "日光束",
                   power: 120,
                   types: ["Grass"]
               },//grass
               {//water
                   id: 9,
                   name: "水砲",
                   power: 110,
                   types: ["Water"]
               },//water
               {//fire
                   id: 10,
                   name: "噴射火焰",
                   power: 90,
                   types: ["Fire"]
               },
               {
                   id: 11,
                   name: "大字爆炎",
                   power: 115,
                   types: ["Fire"]
               },
               {
                   id: 12,
                   name: "火焰拳",
                   power: 75,
                   types: ["Fire"]
               },//fire
               {//flying
                   id: 13,
                   name: "勇鳥猛攻",
                   power: 120,
                   types: ["Flying"]
               },
               {
                   id: 14,
                   name: "燕返",
                   power: 60,
                   types: ["Flying"]
               },
               {
                   id: 15,
                   name: "空氣斬",
                   power: 75,
                   types: ["Flying"]
               },//flying
               {//bug
                   id: 16,
                   name: "十字剪",
                   power: 80,
                   types: ["Bug"]
               },
               {
                   id: 17,
                   name: "急速折返",
                   power: 70,
                   types: ["Bug"]
               },
               {
                   id: 18,
                   name: "超級角擊",
                   power: 120,
                   types: ["Bug"]
               },//bug
               {//electric
                   id: 19,
                   name: "十萬伏特",
                   power: 95,
                   types: ["Electric"]
               },
               {
                   id: 20,
                   name: "打雷",
                   power: 120,
                   types: ["Electric"]
               },
               {
                   id: 21,
                   name: "電網",
                   power: 55,
                   types: ["Electric"]
               },
               {
                   id: 22,
                   name: "雷電拳",
                   power: 75,
                   types: ["Electric"]
               },//electric
               {//ice
                   id: 23,
                   name: "冰凍光束",
                   power: 90,
                   types: ["Ice"]
               },
               {
                   id: 24,
                   name: "暴風雪",
                   power: 125,
                   types: ["Ice"]
               },
               {
                   id: 25,
                   name: "冰凍拳",
                   power: 75,
                   types: ["Ice"]
               },//ice
               {//fighting
                   id: 26,
                   name: "近身戰",
                   power: 120,
                   types: ["Fighting"]
               },
               {
                   id: 27,
                   name: "波導彈",
                   power: 80,
                   types: ["Fighting"]
               },
               {
                   id: 28,
                   name: "劈瓦",
                   power: 75,
                   types: ["Fighting"]
               },
               {
                   id: 29,
                   name: "撲擊",
                   power: 80,
                   types: ["Fighting"]
               },
               {
                   id: 30,
                   name: "真氣彈",
                   power: 120,
                   types: ["Fighting"]
               },//fighting
               {//poison
                   id: 31,
                   name: "毒擊",
                   power: 80,
                   types: ["Poison"]
               },
               {
                   id: 32,
                   name: "汙泥波",
                   power: 95,
                   types: ["Poison"]
               },//poison
               {//ground
                   id: 33,
                   name: "地震",
                   power: 100,
                   types: ["Ground"]
               },
               {
                   id: 34,
                   name: "挖洞",
                   power: 80,
                   types: ["Ground"]
               },//ground
               {//psychic
                   id: 35,
                   name: "精神強念",
                   power: 90,
                   types: ["Psychic"]
               },
               {
                   id: 36,
                   name: "精神擊破",
                   power: 100,
                   types: ["Psychic"]
               },//psychic
               {//rock
                   id: 37,
                   name: "尖石攻擊",
                   power: 120,
                   types: ["Rock"]
               },
               {
                   id: 38,
                   name: "岩石封鎖",
                   power: 60,
                   types: ["Rock"]
               },//rock
               {//ghost
                   id: 39,
                   name: "暗影球",
                   power: 120,
                   types: ["Ghost"]
               },//ghost
               {//dragon
                   id: 40,
                   name: "逆鱗",
                   power: 120,
                   types: ["Dragon"]
               },
               {
                   id: 41,
                   name: "龍之波動",
                   power: 85,
                   types: ["Dragon"]
               },
               {
                   id: 42,
                   name: "流星群",
                   power: 130,
                   types: ["Dragon"]
               },//dragon
               {//dark
                   id: 43,
                   name: "咬碎",
                   power: 80,
                   types: ["Dark"]
               },
               {
                   id: 44,
                   name: "惡之波動",
                   power: 85,
                   types: ["Dark"]
               },
               {
                   id: 45,
                   name: "地獄突刺",
                   power: 80,
                   types: ["Dark"]
               },//dark
               {//steel
                   id: 46,
                   name: "鐵頭",
                   power: 80,
                   types: ["Steel"]
               },
               {
                   id: 47,
                   name: "鐵尾",
                   power: 100,
                   types: ["Steel"]
               },
               {
                   id: 48,
                   name: "加農光砲",
                   power: 80,
                   types: ["Steel"]
               },
               {
                   id: 49,
                   name: "彗星拳",
                   power: 90,
                   types: ["Steel"]
               },
               {
                   id: 50,
                   name: "鋼翼",
                   power: 70,
                   types: ["Steel"]
               },//steel
               {//fairy
                   id: 51,
                   name: "魔法閃耀",
                   power: 80,
                   types: ["Fairy"]
               },
               {
                   id: 52,
                   name: "月亮之力",
                   power: 95,
                   types: ["Fairy"]
               },
               {
                   id: 53,
                   name: "嬉鬧",
                   power: 90,
                   types: ["Fairy"]
               }//fairy
           ];
        function getSkillsNames(skillIds) {
            // 將技能ID映射為技能名稱
            var skillNames = skillIds.map(function (skillId) {
                var foundSkill = skill.find(function (s) {
                    return s.id === skillId;
                });
                return foundSkill ? foundSkill.name : "未知技能";
            });
            return skillNames;
        }
        function showConfirmation(imgId) {
            // 獲取點擊的圖片的 id
            var pokemonId = document.getElementById(imgId).id;
    
            // 在 pokemonData 陣列中找到對應的 Pokemon 物件
            var selectedPokemon = pokemonData.find(function (pokemon) {
                return pokemon.name === pokemonId;
            });
            
            // 如果找到符合的 Pokemon，顯示相應的資料
            if (selectedPokemon) {
                var skillsNames = getSkillsNames(selectedPokemon.skills);
                alert(
                    "確認選擇 " +
                    selectedPokemon.name +
                    " 作為對戰寶可夢?\n" +
                    "HP: " + selectedPokemon.hp + "\n" +
                    "攻擊: " + selectedPokemon.attack + "\n" +
                    "防禦: " + selectedPokemon.defense + "\n" +
                    "速度: " + selectedPokemon.speed + "\n" +
                    "屬性: " + selectedPokemon.types.join(", ") + "\n" +
                    "技能: " + skillsNames
                );
            } 
            else {
                alert("找不到符合的寶可夢資料。");
            }
            var pokemonId = imgId;

        // 將 Pokemon 的 ID 傳遞到 battle.html
            window.location.href = "battle.html?pokemonId=" + encodeURIComponent(pokemonId);
        }
    </script>
</head>
<body>
    <div class="image-container">
        <img src="Abra.png" id="Abra" onclick="showConfirmation(this.id)">
        <img src="Blastoise.png" id="Blastoise" onclick="showConfirmation(this.id)">
        <img src="Blaziken.png" id="Blaziken" onclick="showConfirmation(this.id)">
        <img src="Bulbasaur.png" id="Bulbasaur" onclick="showConfirmation(this.id)">
        <img src="Charizard.png" id="Charizard" onclick="showConfirmation(this.id)">
        <img src="Charmander.png" id="Charmander" onclick="showConfirmation(this.id)">
        <img src="Clefable.png" id="Clefable" onclick="showConfirmation(this.id)">
        <img src="Dragonite.png" id="Dragonite" onclick="showConfirmation(this.id)">
        <img src="Electivire.png" id="Electivire" onclick="showConfirmation(this.id)">
        <img src="Exeggutor.png" id="Exeggutor" onclick="showConfirmation(this.id)">
        <img src="Garchomp.png" id="Garchomp" onclick="showConfirmation(this.id)">
        <img src="Gardevoir.png" id="Gardevoir" onclick="showConfirmation(this.id)">
        <img src="Gengar.png" id="Gengar" onclick="showConfirmation(this.id)">
        <img src="Gyarados.png" id="Gyarados" onclick="showConfirmation(this.id)">
        <img src="Hydreigon.png" id="Hydreigon" onclick="showConfirmation(this.id)">
        <img src="Scizor.png" id="Scizor" onclick="showConfirmation(this.id)">
        <img src="Lucario.png" id="Lucario" onclick="showConfirmation(this.id)">
        <img src="Machamp.png" id="Machamp" onclick="showConfirmation(this.id)">
        <img src="Magneton.png" id="Magneton" onclick="showConfirmation(this.id)">
        <img src="Mamoswine.png" id="Mamoswine" onclick="showConfirmation(this.id)">
        <img src="Marowak.png" id="Marowak" onclick="showConfirmation(this.id)">
        <img src="Meowth.png" id="Meowth" onclick="showConfirmation(this.id)">
        <img src="Metagross.png" id="Metagross" onclick="showConfirmation(this.id)">
        <img src="Onix.png" id="Onix" onclick="showConfirmation(this.id)">
        <img src="Pidgeot.png" id="Pidgeot" onclick="showConfirmation(this.id)">
        <img src="Pikachu.png" id="Pikachu" onclick="showConfirmation(this.id)">
        <img src="Ponyta.png" id="Ponyta" onclick="showConfirmation(this.id)">
        <img src="Salamence.png" id="Salamence" onclick="showConfirmation(this.id)">
        <img src="Sandslash.png" id="Sandslash" onclick="showConfirmation(this.id)">
        <img src="Sceptile.png" id="Sceptile" onclick="showConfirmation(this.id)">
        <img src="Snorlax.png" id="Snorlax" onclick="showConfirmation(this.id)">
        <img src="Squirtle.png" id="Squirtle" onclick="showConfirmation(this.id)">
        <img src="Swampert.png" id="Swampert" onclick="showConfirmation(this.id)">
        <img src="Togekiss.png" id="Togekiss" onclick="showConfirmation(this.id)">
        <img src="Weezing.png" id="Weezing" onclick="showConfirmation(this.id)">
        <img src="Mewtwo.png" id="Mewtwo" onclick="showConfirmation(this.id)">
    </div>
</body>
</html>
