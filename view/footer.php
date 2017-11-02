    </div>
  </div>

  <footer class="text-muted">
    <div class="footercontainer">
      <?php
        require_once '../config/config.php';
        global $config;
       ?>
      <div class="footercontent">
        &copy; by Yvo Hofer and Lars Bärtschi <br> Powered by <a target="_blank" href="http://transport.opendata.ch">OpenData.ch</a><br>
        <a href="/impressum" target="_blank">Impressum</a><br><br>
        Letzte Aktualisierung: <strong><?= $config["deploy"] ?></strong>
      </div>
    </div>
  </footer>
  <script src="/js/jquery-3.2.1.min.js"></script>
  <script src="/js/script.js"></script>
</body>
</html>
