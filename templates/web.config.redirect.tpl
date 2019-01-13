                <rule name="Rewrite latest REAL_FILENAME" stopProcessing="true">
                    <match url="^downloads/releases/FAKE_FILENAME$" />
                    <action type="Redirect" url="/downloads/releases/REAL_FILENAME" appendQueryString="false" redirectType="Temporary" />
                </rule>
