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
        var skills = [];
        var pokemonData = [];
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
            function init(){
                
            }
        // 將 Pokemon 的 ID 傳遞到 battle.html
            window.location.href = "battle.html?pokemonId=" + encodeURIComponent(pokemonId);
        }
    </script>
</head>
<body>
    <div class="image-container">
        <img src="pokemon/Abra.png" id="Abra" onclick="showConfirmation(this.id)">
        <img src="pokemon/Blastoise.png" id="Blastoise" onclick="showConfirmation(this.id)">
        <img src="pokemon/Blaziken.png" id="Blaziken" onclick="showConfirmation(this.id)">
        <img src="pokemon/Bulbasaur.png" id="Bulbasaur" onclick="showConfirmation(this.id)">
        <img src="pokemon/Charizard.png" id="Charizard" onclick="showConfirmation(this.id)">
        <img src="pokemon/Charmander.png" id="Charmander" onclick="showConfirmation(this.id)">
        <img src="pokemon/Clefable.png" id="Clefable" onclick="showConfirmation(this.id)">
        <img src="pokemon/Dragonite.png" id="Dragonite" onclick="showConfirmation(this.id)">
        <img src="pokemon/Electivire.png" id="Electivire" onclick="showConfirmation(this.id)">
        <img src="pokemon/Exeggutor.png" id="Exeggutor" onclick="showConfirmation(this.id)">
        <img src="pokemon/Garchomp.png" id="Garchomp" onclick="showConfirmation(this.id)">
        <img src="pokemon/Gardevoir.png" id="Gardevoir" onclick="showConfirmation(this.id)">
        <img src="pokemon/Gengar.png" id="Gengar" onclick="showConfirmation(this.id)">
        <img src="pokemon/Gyarados.png" id="Gyarados" onclick="showConfirmation(this.id)">
        <img src="pokemon/Hydreigon.png" id="Hydreigon" onclick="showConfirmation(this.id)">
        <img src="pokemon/Scizor.png" id="Scizor" onclick="showConfirmation(this.id)">
        <img src="pokemon/Lucario.png" id="Lucario" onclick="showConfirmation(this.id)">
        <img src="pokemon/Machamp.png" id="Machamp" onclick="showConfirmation(this.id)">
        <img src="pokemon/Magneton.png" id="Magneton" onclick="showConfirmation(this.id)">
        <img src="pokemon/Mamoswine.png" id="Mamoswine" onclick="showConfirmation(this.id)">
        <img src="pokemon/Marowak.png" id="Marowak" onclick="showConfirmation(this.id)">
        <img src="pokemon/Meowth.png" id="Meowth" onclick="showConfirmation(this.id)">
        <img src="pokemon/Metagross.png" id="Metagross" onclick="showConfirmation(this.id)">
        <img src="pokemon/Onix.png" id="Onix" onclick="showConfirmation(this.id)">
        <img src="pokemon/Pidgeot.png" id="Pidgeot" onclick="showConfirmation(this.id)">
        <img src="pokemon/Pikachu.png" id="Pikachu" onclick="showConfirmation(this.id)">
        <img src="pokemon/Ponyta.png" id="Ponyta" onclick="showConfirmation(this.id)">
        <img src="pokemon/Salamence.png" id="Salamence" onclick="showConfirmation(this.id)">
        <img src="pokemon/Sandslash.png" id="Sandslash" onclick="showConfirmation(this.id)">
        <img src="pokemon/Sceptile.png" id="Sceptile" onclick="showConfirmation(this.id)">
        <img src="pokemon/Snorlax.png" id="Snorlax" onclick="showConfirmation(this.id)">
        <img src="pokemon/Squirtle.png" id="Squirtle" onclick="showConfirmation(this.id)">
        <img src="pokemon/Swampert.png" id="Swampert" onclick="showConfirmation(this.id)">
        <img src="pokemon/Togekiss.png" id="Togekiss" onclick="showConfirmation(this.id)">
        <img src="pokemon/Weezing.png" id="Weezing" onclick="showConfirmation(this.id)">
        <img src="pokemon/Mewtwo.png" id="Mewtwo" onclick="showConfirmation(this.id)">
    </div>
</body>
</html>
