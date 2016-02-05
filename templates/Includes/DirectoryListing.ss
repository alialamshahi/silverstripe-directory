<div class="directorylisting">
  <% if $Photo %>
  <% with $Photo %>
  <img src="$URL" width="$Width" height="$Height" alt="$Title" title="$Title" class="listing-image"/>
  <% end_with %>
  <% end_if %>
  <% if $Title %>
  <h2 class="listing-title">$Title</h2>
  <% end_if %>
  <% if $Date %>
  <h2 class="listing-title">$Date</h2>
  <% end_if %>
  <% if $CategoryID %>
  <h2 class="listing-title">$Category.Title</h2>
  <% end_if %>
  <% if $Description %>
  <p class="listing-description">$Description</p>
  <% end_if %>
  <% if $Manager %>
  <p class="listing-manager">$Manager</p>
  <% end_if %>
  <% if $Address %>
  <p class=""listing-address>$Address</p>
  <% end_if %>
  <% if $Website %>
  <p class="listing-url"><a href="$Website">Website</a></p>
  <% end_if %>
  <% if $Email %>
  <p class="listing-email"><a href="mailto:$Email">Email</a></p>
  <% end_if %>
  <% if $Phone %>
  <p class="listing-phone">$Phone</p>
  <% end_if %>
</div>
