
<?phpfunction generateFooterLink($url, $text, $class = "footer-button") {    return '<a href="' . $url . '" class="' . $class . '">' . $text . '</a>';}
echo '<footer class="footer">';echo '<a href="#" class="stt" title="scroll to top"></a>';echo '<div class="footer-left">';echo generateFooterLink("https://twitter.com/", "Twitter");echo generateFooterLink("https://www.linkedin.com/", "LinkedIn");echo generateFooterLink("https://discord.com/", "Discord");echo generateFooterLink("mailto:105334128@student.swin.edu.au", "Email");echo '</div>';
echo '<div class="footer-right">';echo generateFooterLink("images/australian-privacy-principles.pdf", "Privacy", "footer-button");echo generateFooterLink("images/terms-of-use.pdf", "Terms", "footer-button");echo '<div class="copyright">©2024 Auris AI</div>';echo '</div>';
echo '</footer>';?>
