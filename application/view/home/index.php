<div class="container" id="image-container">
    <h2>You are in the View: application/view/home/index.php (everything in the box comes from this file)</h2>
    <p>In a real application this could be the homepage.</p>
</div>

<input id="test-input" type="text" required autofocus/>
<button id="search-get" type="submit" onclick='onGetClick()'>GET REQUEST</button>
<button id="search-post" type="submit" onclick='onPostClick()'>POST REQUEST</button>
<button id="search-json" type="submit" onclick='onGetJsonClick()'>GET JSON BACK</button>
<button id="search-json" type="submit" onclick='onInsertClick()'>ON INSERT</button>
<button id="search-json" type="submit" onclick='onDeleteClick()'>ON DELETE</button>
<button id="search-json" type="submit" onclick='onUpdateClick()'>ON UPDATE</button>

<button id="listing-get" type="submit" onclick='onTestListingClick()'>Test Get Listing</button>
<button id="listing-create" type="submit" onclick='onTestCreateListingClick()'>Test Create Listing</button>
<button id="listing-detail-edit" type="submit" onclick='onTestEditListingDetailClick()'> Test Edit Listing Details</button>
<button id="listing-detail-create" type="submit" onclick='onTestCreateListingDetailClick()'> Test Create Listing Details</button>

<br>

<input type="file" id="test-image"/>
<button id="search-upload" type="submit" onclick='uploadImage()'>UPLOAD IMAGE</button>