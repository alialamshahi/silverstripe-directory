<div class="listing-container">
  <h1>$Title</h1>
  $Content
  <% if $PaginatedListing %>
  
  
  <% if $CategoryList %>
  <ul id="category-list">
  <% loop $CategoryList %>
  <li>$Title</li>
  <% end_loop %>
  </ul>
  <% end_if %>
  
  <% loop $PaginatedListing %>
  <% include DirectoryListing %>
  <% end_loop %>
  <% else %>
  <p class="message warning">No Listings available.</p>
  <% end_if %>
  <!-- Pagination -->
  <% if $PaginatedListing.MoreThanOnePage %>
  <div class="pagination">
    <% if $PaginatedListing.NotFirstPage %>
    <ul id="previous">
      <li><a href="$PaginatedListing.PrevLink">&#8594;</a></li>
    </ul>
    <% end_if %>
    <ul>
      <% loop $PaginatedListing.PaginationSummary %>
      <% if $Link %>
      <li <% if $CurrentBool %>class="active"<% end_if %>> <a href="$Link">$PageNum</a> </li>
      <% else %>
      <li>...</li>
      <% end_if %>
      <% end_loop %>
    </ul>
    <% if $PaginatedListing.NotLastPage %>
    <ul id="next">
      <li><a href="$PaginatedListing.NextLink">&#8592;</a></li>
    </ul>
    <% end_if %>
  </div>
  <% end_if %>
  $Form
  $PageComments
</div>