<!-- Button to trigger modal (Eye SVG inside a button element) -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#settingsModal"
        style="background: gray; border: none;">
    <!-- Eye SVG Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye"
         viewBox="0 0 16 16">
        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.07-.122.146-.195.23a13.133 13.133 0 0 1-1.66 2.043C11.879 11.332 10.12 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.133 13.133 0 0 1 1.172 8z"/>
        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5z"/>
    </svg>
</button>

<!-- Modal Structure -->
<div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsModalLabel">Цифрова доступність</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Font Size Control (Plus-Minus Buttons) -->
                <div class="mb-3">
                    <label for="fontSizeControl" class="form-label">Змінити розмір</label>
                    <div id="fontSizeControl">
                        <button type="button" class="btn btn-secondary" onclick="adjustFontSize('decrease')">-</button>
                        <button type="button" class="btn btn-secondary" onclick="adjustFontSize('increase')">+</button>
                    </div>
                </div>

                <!-- Colorblind Mode Toggle -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="colorblindMode"/>
                    <label class="form-check-label" for="colorblindMode">Включити Colorblind-Friendly кольори</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-primary" onclick="applySettings()">Застосувати</button>
            </div>
        </div>
    </div>
</div>
