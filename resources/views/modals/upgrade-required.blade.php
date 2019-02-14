<!-- Upgrade Required Modal -->
<div class="modal fade" id="modal-upgrade-required" tabindex="-1" role="dialog" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    {{__('Upgrade Required')}}
                </h4>
            </div>

            <div class="modal-body">
                <span id="upgrade-required-reason"></span>
                {{__('You need to upgrade your subscripiton.')}}
            </div>

            <!-- Modal Actions -->
            <div class="modal-footer">
                <a href="/settings#/subscription">
                    <button type="button" class="btn btn-default">
                        {{__('Go To Billing')}}
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
