/**
 * Theme2012Plus.js
 *
 */
/* �浵ҳ�� jQ���� */
$('#expand_collapse,.archives-yearmonth').css({cursor:"s-resize"});
$('#archives ul li ul.archives-monthlisting').hide();
$('#archives ul li ul.archives-monthlisting:first').show();
$('#archives ul li span.archives-yearmonth').click(function(){$(this).next().slideToggle('fast');return false;});
//��������ȫ�ֵĲ���
$('#expand_collapse').toggle(
function(){
$('#archives ul li ul.archives-monthlisting').slideDown('fast');
},
function(){
$('#archives ul li ul.archives-monthlisting').slideUp('fast');
});