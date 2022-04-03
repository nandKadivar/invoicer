<table width="100%" class="items-table" cellspacing="0" border="0">
    <tr class="item-table-heading-row">
        <th width="2%" class="pr-20 text-right item-table-heading">#</th>
        {{-- <th width="40%" class="pl-0 text-left item-table-heading">@lang('pdf_items_label')</th> --}}
        <th width="40%" class="pl-0 text-left item-table-heading">Items</th>
        {{-- @foreach($customFields as $field)
            <th class="text-right item-table-heading">{{ $field->label }}</th>
        @endforeach --}}
        {{-- <th class="text-right item-table-heading">{{ $field->label }}</th> --}}

        {{-- <th class="pr-20 text-right item-table-heading">@lang('pdf_quantity_label')</th> --}}
        <th class="pr-20 text-right item-table-heading">Quantity</th>
        {{-- <th class="pr-20 text-right item-table-heading">@lang('pdf_price_label')</th> --}}
        <th class="pr-20 text-right item-table-heading">Price</th>
        {{-- @if($invoice->discount_per_item === 'YES')
        <th class="pl-10 text-right item-table-heading">@lang('pdf_discount_label')</th>
        @endif --}}
        @if($invoice->items[0]->gst_type === 'CGST&SGST')
        <th class="pl-10 text-right item-table-heading">SGST</th>
        <th class="pl-10 text-right item-table-heading">CGST</th>
        @else
        <th class="pl-10 text-right item-table-heading">IGST</th>
        @endif
        <th class="text-right item-table-heading">Amount</th>
    </tr>
    @php
        $index = 1
    @endphp
    @foreach ($invoice->items as $item)
        <tr class="item-row">
            <td
                class="pr-20 text-right item-cell"
                style="vertical-align: top;"
            >
                {{$index}}
            </td>
            <td
                class="pl-0 text-left item-cell"
                style="vertical-align: top;"
            >
                <span>{{ $item->name }}</span><br>
                <span class="item-description">{!! nl2br(htmlspecialchars($item->description)) !!}</span>
            </td>
            {{-- @foreach($customFields as $field)
                <td class="text-right item-cell" style="vertical-align: top;">
                    {{ $item->getCustomFieldValueBySlug($field->slug) }}
                </td>
            @endforeach --}}
            <td
                class="pr-20 text-right item-cell"
                style="vertical-align: top;"
            >
                {{$item->quantity}} @if($item->unit_name) {{$item->unit_name}} @endif
            </td>
            <td
                class="pr-20 text-right item-cell"
                style="vertical-align: top;"
            >
                {{-- {!! format_money_pdf($item->price, $invoice->customer->currency) !!} --}}
                {{-- {!! format_money_pdf($item->price, $invoice->customer->currency) !!} --}}
                {{$invoice->currency->symbol}}{{$item->price}}
            </td>

            @if($invoice->items[0]->gst_type === 'CGST&SGST')
            <td
                class="pl-10 text-right item-cell"
                style="vertical-align: top;"
            >
                {{$item->tax/2}}
            
                {{$item->item->gst/2}}%
                        
            </td>
            <td
                class="pl-10 text-right item-cell"
                style="vertical-align: top;"
            >
                {{$item->tax/2}}
            
                {{$item->item->gst/2}}%
                        
            </td>
            @else
            <td
                class="pl-10 text-right item-cell"
                style="vertical-align: top;"
            >
                {{$item->tax}}
            
                {{$item->item->gst}}%
                        
            </td>
            @endif

            {{-- @if($invoice->discount_per_item === 'YES')
                <td
                    class="pl-10 text-right item-cell"
                    style="vertical-align: top;"
                >
                    @if($item->discount_type === 'fixed')
                            {!! format_money_pdf($item->discount_val, $invoice->customer->currency) !!}
                        @endif
                        @if($item->discount_type === 'percentage')
                            {{$item->discount}}%
                        @endif
                </td>
            @endif --}}

            {{-- @if($invoice->tax_per_item === 'YES')
                <td
                    class="pl-10 text-right item-cell"
                    style="vertical-align: top;"
                >
                    {!! format_money_pdf($item->tax, $invoice->customer->currency) !!}
                </td>
            @endif --}}

            <td
                class="text-right item-cell"
                style="vertical-align: top;"
            >
                {{$invoice->currency->symbol}}{{$item->total}}
            </td>
        </tr>
        @php
            $index += 1
        @endphp
    @endforeach
</table>

<hr class="item-cell-table-hr">

<div class="total-display-container">
    <table width="100%" cellspacing="0px" border="0" class="total-display-table @if(count($invoice->items) > 12) page-break @endif">
        <tr>
            <td class="border-0 total-table-attribute-label">Sub total</td>
            <td class="py-2 border-0 item-cell total-table-attribute-value">
                {{$invoice->currency->symbol}}{{$invoice->sub_total}}
            </td>
        </tr>

        @if($invoice->discount_val > 0)
            @if ($invoice->discount_per_item == 'NO')
                <tr>
                    <td class="border-0 total-table-attribute-label">
                        @if($invoice->discount_type == 'fixed')
                            {{-- @lang('pdf_discount_label') --}}
                            Discount
                        @endif
                        @if($invoice->discount_type == 'percentage')
                            Discount ({{$invoice->discount_val}}%)
                        @endif
                    </td>
                    <td class="py-2 border-0 item-cell total-table-attribute-value" >
                        @if($invoice->discount_type == 'fixed')
                            {{$invoice->currency->symbol}} {{$invoice->discount_val}}
                        @endif
                        @if($invoice->discount_type == 'percentage')
                            {{$invoice->currency->symbol}} {{$invoice->sub_total*$invoice->discount_val/100}}
                        @endif
                    </td>
                </tr>
            @endif
        @endif

        {{-- @if ($invoice->tax_per_item === 'YES')
            @foreach ($taxes as $tax)
                <tr>
                    <td class="border-0 total-table-attribute-label">
                        {{$tax->name.' ('.$tax->percent.'%)'}}
                    </td>
                    <td class="py-2 border-0 item-cell total-table-attribute-value">
                        {!! format_money_pdf($tax->amount, $invoice->customer->currency) !!}
                    </td>
                </tr>
            @endforeach
        @else
            @foreach ($invoice->taxes as $tax)
                <tr>
                    <td class="border-0 total-table-attribute-label">
                        {{$tax->name.' ('.$tax->percent.'%)'}}
                    </td>
                    <td class="py-2 border-0 item-cell total-table-attribute-value">
                        {!! format_money_pdf($tax->amount, $invoice->customer->currency) !!}
                    </td>
                </tr>
            @endforeach
        @endif --}}

        <tr>
            <td class="py-3"></td>
            <td class="py-3"></td>
        </tr>
        <tr>
            <td class="border-0 total-border-left total-table-attribute-label">
                {{-- @lang('pdf_total') --}}
                Total
            </td>
            <td
                class="py-8 border-0 total-border-right item-cell total-table-attribute-value"
                style="color: #5851D8"
            >
            {{$invoice->currency->symbol}} {{$invoice->total}}
            </td>
        </tr>
    </table>
</div>
