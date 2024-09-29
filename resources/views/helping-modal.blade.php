<!-- Button to trigger modal (Eye SVG instead of "Open Settings") -->


<!-- Modal Structure -->
<div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsModalLabel">Accessibility Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Font Size Control (Plus-Minus Buttons) -->
                <div class="mb-3">
                    <label for="fontSizeControl" class="form-label">Adjust Font Size</label>
                    <div id="fontSizeControl">
                        <button type="button" class="btn btn-secondary" onclick="adjustFontSize('decrease')">-</button>
                        <button type="button" class="btn btn-secondary" onclick="adjustFontSize('increase')">+</button>
                    </div>
                </div>

                <!-- Colorblind Mode Toggle -->
                {{--                <div class="form-check">--}}
                {{--                    <input class="form-check-input" type="checkbox" id="colorblindMode" />--}}
                {{--                    <label class="form-check-label" for="colorblindMode">Enable Colorblind-Friendly Colors</label>--}}
                {{--                </div>--}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="applySettings()">Apply</button>
            </div>
        </div>
    </div>
</div>
