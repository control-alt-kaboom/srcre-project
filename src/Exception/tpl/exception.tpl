<?php


print <<<END
<style>
  .exTable {border:1px solid #DEDEDE; padding:10px; border-collapse:collapse;}
  .exTable td {padding:10px;border:1px solid #DEDEDE;}
  .exHead { font-weight:bolder;vertical-align:top; min-width:150px; }
</style>
<table class="exTable">
  <tr>
    <td class="exHead">Exception:</td>
    <td>{$_exceptionTemplate['message']}</td>
  </tr>
  <tr>
    <td class="exHead">File:</td>
    <td>{$_exceptionTemplate['file']}</td>
  </tr>
  <tr>
    <td class="exHead">Line:</td>
    <td>{$_exceptionTemplate['line']}</td>
  </tr>
  <tr>
    <td class="exHead">Function:</td>
    <td>{$_exceptionTemplate['func']}</td>
  </tr>
  <tr>
    <td class="exHead">Class:</td>
    <td>{$_exceptionTemplate['class']}</td>
  </tr>
  <tr>
    <td class="exHead">Object:</td>
    <td>{$_exceptionTemplate['object']}</td>
  </tr>
  <tr>
    <td class="exHead">Code:</td>
    <td>{$_exceptionTemplate['code']}</td>
  </tr>
  <tr>
    <td class="exHead">Previous:</td>
    <td>{$_exceptionTemplate['previous']}</td>
  </tr>
  <tr>
    <td class="exHead">BackTrace:</td>
    <td><pre>{$_exceptionTemplate['backtrace']}</pre></td>
  </tr>
  <tr>
    <td class="exHead">Stack:</td>
    <td><pre>{$_exceptionTemplate['stack']}</pre></td>
  </tr>
</table>

END;
