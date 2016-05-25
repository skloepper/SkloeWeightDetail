{block name='frontend_detail_data_ordernumber' append}
{if $sArticle.weight}
   <p style="{$SkloeWeightDetail.styles}">{se name="DetailDataWeight"}Gewicht:{/se} {$sArticle.weight|replace:'.':','} {$SkloeWeightDetail.sign}</p>
{/if}
{/block}

{block name='frontend_checkout_shipping_costs_country' prepend}
{if $SkloeWeightDetail.basket}
	{if $sDispatch.weight}
	<div class="basket_country" style="{$SkloeWeightDetail.stylesbasket}">
		<p>
			{se name="CartWeightTotal"}Gesamtgewicht:{/se} <span style="font-size:20px;">{$sDispatch.weight|string_format:"%.2f"|replace:'.':','}</span> {$SkloeWeightDetail.sign}
		</p>
	</div>
	{/if}
{/if}
{/block}

{block name='frontend_checkout_confirm_left_payment_method' prepend}
{if $SkloeWeightDetail.basket}
{if !$sRegisterFinished}
	{if $sDispatch.weight}
	<p class="payment--method-info">
		<span class="payment--title is--bold">{s name="ConfirmWeightTotal"}Gesamtgewicht:{/s}</span>
		<span class="payment--description">{$sDispatch.weight|string_format:"%.2f"|replace:'.':','} {$SkloeWeightDetail.sign}</span>
	</p>
	{/if}
{/if}
{/if}
{/block}