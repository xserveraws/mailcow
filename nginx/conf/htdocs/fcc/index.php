<?php
session_start();
include_once("vars.inc.php");
include_once("functions.inc.php");
include_once("triggers.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>fufix control center</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="box">
<a href="."><img alt="fcc" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMUAAAA0CAYAAAA69vxMAAAABGdBTUEAALGPC/xhBQAAAAlwSFlzAAAOwAAADsABataJCQAAABh0RVh0U29mdHdhcmUAcGFpbnQubmV0IDQuMC41ZYUyZQAABOFJREFUeF7tlgFy3TAIRHv/S6dR2/0hb0AS/pLt1HTmecWCgNrJtL8+Pj6KojC4ZlE8Gdc8yuefT/lSEflFTPTOIn83V829Atfs0V4KsTmrIvKLv+/EYn2rIvJ3c9XcK3DNHnw50sizMf3i+7ux78f68mxMfzdXzb0C1+zBlyMtjmHfY73Le+CaPexHtFocw77Hepf3wDV72I9otTiGfY/1Lu+BaxbFk3HNongyrlkUT+br8O//sz2NYN2MZuF96SrYV5qF93vqwZoZzcL7R3U3nCddBfu+tD2+GQOd9Uaahfelq2BfaRbeHynPNp7VLLx/VHfDedJVsO9L20OGYDwiqu/5WdijwZp3YO8Ga2Zgj0bke2R7ND8LezSO+LvhzAZr3oG9G398WzDSCNbNaBbel66CfaVZeL+nHqyZ0Sy8f1R3w3nSVbDvS9vjm5FUQX+kWXhfugr2lWbh/ax63kiz8P5R3Q3nSVfBvi9tj29GUgX9kWbhfekq2Feahfez6nkjzcL7R3U3nCddBfu+tD2KovjCNUfwN+ssds/d3T/i7HlH0I532TW7T6beNUdkBqxk99zd/SPOnncE7XiXXb192pnYnNUerhnRGnqwbjWcJ1h3FPYVrFsN5zVYczXcT7DuLLiH6OU81M/DNSPYWLBuNZwnWHcU9hWsWw3nNVhzNdxPsO4suIdQjhrR8hGu2SPTfCW75+7uH3HFzCx2xzvsGe2js6eW5vVwzR5qOtN8Jbvn7u4fcdXcDHfbMdqHfqQjXLMonoxrFsWTcc0R2X+OVrF77u7+EWfPO4J2vMOubQdic1Z1Jsp5uGYEGwvWrYbzBOuOwr6CdavhvAZrrob7CdadieZbjWCd1QjXHDHbfDW75+7uH3H2vCNoxzvsyl2ks540wjV7tIYW5nexe+7u/hFXzMxid7zDntrBU0vzmLca4ZoRrZkH61bDeYJ1R2FfwbrVcF6DNVfD/QTrzkTzrUawzmqEa/aYbbya3XN394+4am6Gu+3IfSIV9KURrlkUT8Y178rsb/qIVX2K68h+w0y9a47IDFjJqrlRn8jfzdnzjqAd77Jrdp9MvWuOyAxYiTeX3kgjz8b0d3PVvFmd9UaahfelkdfDq6f30vaYpV3yYN0uNMvObGfS85WjerTcTjivwZodcGYj8iOyfZqfhT0aNmd1hFffzuSPr4IZ2ECw7kw0f1Y9Ws6DdavhvAZrdqA5MxrBuhnNwvvSVbDvS9sjAxtcDfcZacRs3WqumMuZWRX0R5qF96WrYN+XtkcGNrga7jPSiNm61czMbTkL81nU46gK+iPNwvvSVbDvS9vjabS/vIX5u8A9BeuKtbjmU/gpP2Q/Zc//Bde8Izt+MHb03MFP2fN/wTXfRR+RH3PWF738kZx85ulHqN4S5SPfEuXlM0+/2INrvkP0Aenb2J69OPLoR2cvjrwerGcc+b3Ynr048op9uOY7RB+Qvo3t2YsjL+MzjrwerI/iyPdinYlqbY31in245jtEH5C+je3ZiyMv4zOOvB6st3F0HsX2HDFTU6zDNd9BH5AfkZ6N7dmLIy/jM468Hqy3cXQexTor9hjli7W45rvoI/Jjjvwopm9zjC3KRTWRH6F6y0zennuxRTmbt16xD9csfOqH8xm4ZuFTvxTPwDWL4rl8/PoN6ZbaIgGBI+oAAAAASUVORK5CYII=" /></a>
<?php if ($_SESSION['fufix_cc_loggedin'] == "yes"): ?>
<p>Clicking on any "Apply" button will inevitably reload Postfix!</p>
<p>Invalid syntax will be ignored.</p>
<h2>Sender Blacklist</h2>
<form method="post">
<div class="line"></div>
<div class="left">Specify a list of senders or domains to blacklist access. <br />Think of it as a hashed check_sender_access table.</div>
<div class="right"><textarea rows="6" name="sender"><?php echo get_fufix_sender_access() ?></textarea></div>
<div class="clearfix"></div>
<input type="submit" value="Apply">
</form>

<h2>Attachments</h2>
<form method="post">
<div class="line"></div>
<div class="left">Dangerous file types by their extension. <br />
Provide a "|" seperated list of extensions: ext1|ext2|ext3 <br /></div>
<div class="right"><input class="stdinput" type="text" name="ext" value="<?php echo get_fufix_reject_attachments("ext") ?>">
<p>Enter "DISABLED" as extension name to disable this feature.</p></div>
<div class="clearfix"></div>
<div class="left"><img alt="virustotal" src="data:image/png;base64,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" /><br />
Send dangerous attachments to VirusTotal.<br />
You will receive a mail including a link to the results.<br />
<b>If unchecked, mails will be rejected.</b></div>
<div class="right"><input name="virustotaltoggle" type="checkbox" <?php get_fufix_reject_attachments_toggle() ?>></div>
<div class="clearfix"></div>
<div class="left"><a href="https://www.virustotal.com" target="_blank">VirusTotal API Key</a></div>
<div class="right"><input class="stdinput" type="text" name="vtapikey" value="<?php echo file_get_contents($VT_API_KEY); ?>"></div>
<div class="clearfix"></div>
<input type="submit" value="Apply">
</form>

<h2>Privacy</h2>
<form method="post">
<div class="line"></div>
<div class="left">Anonymize outgoing mail:</div>
<div class="right"><input name="anonymize" type="checkbox" <?php get_fufix_anonymize_toggle() ?>></div>
<input type="hidden" name="anonymize_">
<div class="clearfix"></div>
<p>This option enables a PCRE table to remove "User-Agent", "X-Enigmail", "X-Mailer", "X-Originating-IP" and replaces "Received: from" headers with localhost/127.0.0.1.</p>
<input type="submit" value="Apply">
</form>

<h2>Backup mail</h2>
<form method="post">
<div class="line"></div>
<div class="left">Download a copy of your vmail directory as tar.bz2 archive.
<br />This is a very simple function that may or may not work. Consider it unstable.</div>
<div class="right"><input name="backupdl" type="submit" value="Download"></div>
<div class="clearfix"></div>
</form>
<div class="line"></div>

<form method="post">
<br />
<input name="logout" type="submit" value="Logout">
<div class="clearfix"></div>
</form>

<?php else: ?>
<h2>Login</h2>
<form method="post">
<div class="line"></div>
<div class="left">You can login with any superadmin created in <b><a href="../pfadmin">Postfixadmin</a></b>.</div>
<div class="right"><input class="logininput" name="login_user" type="text" placeholder="postfixadmin@domain.tld" autofocus><br />
<input class="logininput" name="pass_user" type="password" placeholder="password"></div>
<div class="clearfix"></div>
<input type="submit" value="Login">
</form>
<?php endif ?>
<p><b><a href="../">&#8592; go back</a></b></p>
</div>
</body>
</html>
