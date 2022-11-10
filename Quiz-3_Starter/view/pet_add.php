
<main>
    <h1>Add Pet</h1>
    <form action="index.php" method="post" id="add_pet_form">
        <input type="hidden" name="action" value="add_pet">

        <label>Species:<label>
		
		
        <select name="species">

				<option value="">

				</option>

	    </select>	

        <br>

        <label>Name:</label>
        <input type="text" name="name" />
        <br>

        <label>Gender:</label>
        <input type="text" name="sex" />
        <br>
		
		<label>Birth:</label>
        <input type="text" name="birth" />
        <br>

        <label>Owner:</label>
        <input type="text" name="owner" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Pet" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="">View Pet List</a>
    </p>

</main>
