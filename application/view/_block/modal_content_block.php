 <div style="border-radius:50px;background-color:#d0e9c6;padding:20px;">
                <form action="<?=URL;?>home/update" method="post" id="editForm">
                    <label for="fname">Edit</label>
                    <input type="text" class="removeName" id="name" name="editName" placeholder="...EDIT..">
                    <input type="hidden" name="id" value="<?=$iddd?>">
                    <input type="hidden" name="attr" value="<?=$attr?>">
                    <button type="submit" id="testBat" class="btn btn-success">Edit</button>
                </form>

            </div>

